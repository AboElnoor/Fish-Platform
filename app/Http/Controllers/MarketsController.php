<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\HSCode;
use App\Models\Market;
use App\Models\PtoolsType;
use App\User;
use Illuminate\Http\Request;

class MarketsController extends Controller
{
    /**
     * Resource constructor
     */
    public function __construct()
    {
        $this->hSCodes = HSCode::all()->pluck('HS_Aname', 'HSCode_ID');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (trim(\Route::current()->getPrefix(), '/') == 'admin' && !in_array(auth()->user()->UserType, [1, 3])) {
            return redirect()->route('admin.admin');
        }

        $hSCodes = $this->hSCodes;
        $markets = Market::latest('id');
        $markets = requestUri() == 'markets' ? $markets->where('type_id', 1) : $markets->where('type_id', 2);

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('markets');
        }
        $type = requestUri() == 'markets' ? 'الأسماك' : 'مستلزمات الانتاج';
        return view(\Route::current()->getPrefix() . '.markets.index', compact('hSCodes', 'markets', 'type'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $hSCodes = $this->hSCodes;
        $markets = Market::latest('id');
        if (request('HSCode_ID')) {
            $markets->where('HSCode_ID', request('HSCode_ID'));
        }

        if (request('buy_request')) {
            $markets->where('buy_request', request('buy_request'));
        }

        if (request('startDate')) {
            $markets->where('startDate', request('startDate'));
        }

        if (request('endDate')) {
            $markets->where('endDate', request('endDate'));
        }

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            $markets = $markets->paginate(10);
            return compact('markets');
        }
        return view('admin.markets.index', compact('markets', 'hSCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hSCodes = $this->hSCodes;
        $types = PtoolsType::all()->pluck('name', 'id');
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $buy = request('buy_request');
        return view(
            \Route::current()->getPrefix() . '.markets.create',
            compact('hSCodes', 'governorates', 'buy', 'types')
        );
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'buy_request' => 'sometimes|nullable',
            'HSCode_ID' => 'required|exists:hscode',
            'pname' => 'sometimes|nullable|string',
            'photo' => 'sometimes|nullable|image',
            'amount' => 'sometimes|nullable|string',
            'package' => 'sometimes|nullable|string',
            'specs' => 'sometimes|nullable|string',
            'ptoolType' => 'sometimes|nullable|exists:ptools_types,id',
            'certificates' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    public function userRules()
    {
        return [
            'provider' => 'sometimes|nullable|string',
            'name' => 'sometimes|nullable|string',
            'mobile' => 'sometimes|nullable|numeric',
            'email' => 'sometimes|nullable|email',
            'fax' => 'sometimes|nullable|numeric',
            'startDate' => 'sometimes|nullable|date',
            'endDate' => 'sometimes|nullable|date',
        ];
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    public function transportRules()
    {
        return [
            'place' => 'sometimes|nullable|boolean',
            'Governorate_ID' => 'sometimes|nullable|numeric',
            'Locality_ID' => 'sometimes|nullable|numeric',
            'Village_ID' => 'sometimes|nullable|numeric',
            'transport' => 'sometimes|nullable|boolean',
            'avarage' => 'sometimes|nullable|string',
            'price' => 'sometimes|nullable|string',
            'payment' => 'sometimes|nullable|string',
            'more' => 'sometimes|nullable|string',
            'transportDate' => 'sometimes|nullable|date',
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $market = $request->validate($this->rules());
        $marketUser = $request->validate($this->userRules());
        $marketTransport = $request->validate($this->transportRules());
        try {
            \DB::transaction(function () use ($market, $marketUser, $marketTransport) {
                $image = request()->file('photo');
                $photo = $image ? $image->store('markets') : 'images/default.jpg';
                $data = [
                    'type_id' => requestUri() == 'markets' ? 1 : 2,
                    'entryUser' => auth()->id(),
                ];

                $market = Market::create(compact('photo') + $data + $market);
                if ($marketUser) {
                    $market->user()->create($marketUser);
                }

                if ($marketTransport) {
                    $market->transport()->create($marketTransport);
                }
            });
            $success = 'تم انشاء السوق بنجاح';
        } catch (\Exception $e) {
            throw $e;
            \Log::error('storing ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('success', 'error');
        }
        return redirect()->route(getRouteNamePrefix() . '.index')->with(compact('success', 'error'));
    }

    /**
     * Add requester information to offer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Market  $company
     * @return \Illuminate\Http\Response
     */
    public function addRequester(Request $request, Market $market)
    {
        $market->requesters()->sync(auth()->id(), false);
        $success = 'تم ارسال رسالة الى صاحب العرض بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * remove requester information from offer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Market  $company
     * @return \Illuminate\Http\Response
     */
    public function CancelRequester(Request $request, Market $market, User $user)
    {
        $market->requesters()->detach($user);
        $success = 'تم الحذف بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        return view(\Route::current()->getPrefix() . '.markets.show', compact('market'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        $hSCodes = $this->hSCodes;
        $types = PtoolsType::all()->pluck('name', 'id');
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $buy = request('buy_request');
        return view(
            \Route::current()->getPrefix() . '.markets.create',
            compact('market', 'hSCodes', 'governorates', 'buy', 'types')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        $marketData = $request->validate($this->rules());
        $marketUser = $request->validate($this->userRules());
        $marketTransport = $request->validate($this->transportRules());
        // dd($marketData);
        try {
            \DB::transaction(function () use ($market, $marketData, $marketUser, $marketTransport) {
                $image = request()->file('photo');
                $photo = $image ? $image->store('markets') : 'images/default.jpg';
                $data = [
                    'type_id' => requestUri() == 'markets' ? 1 : 2,
                    'entryUser' => auth()->id(),
                ];

                if ($photo) {
                    $data += compact('photo');
                }
                $market->update($data + $marketData);
                if ($marketUser) {
                    $market->user()->updateOrCreate($marketUser);
                }

                if ($marketTransport) {
                    $market->transport()->updateOrCreate($marketTransport);
                }
            });
            $success = 'تم التعديل بنجاح';
        } catch (\Exception $e) {
            \Log::error('updating ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('success', 'error');
        }
        return redirect()->route(getRouteNamePrefix() . '.index')->with(compact('success', 'error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        $market->delete();
        $success = 'تم الحذف بنجاح';

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('success');
        }
        return back()->with(compact('success'));
    }
}
