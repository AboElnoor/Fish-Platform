<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\HSCode;
use App\Models\Market;
use App\Models\PtoolsType;
use Illuminate\Http\Request;

class MarketsController extends Controller
{
    /**
     * Resource constructor
     */
    public function __construct()
    {
        $this->hSCodes = requestUri() == 'markets' ?
            HSCode::all()->pluck('HS_Aname', 'HSCode_ID') : PtoolsType::all()->pluck('name', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hSCodes = $this->hSCodes;
        $markets = Market::latest('id');
        $markets = requestUri() == 'markets' ? $markets->where('type_id', 1) : $markets->where('type_id', 2);

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('markets');
        }
        return view(\Route::current()->getPrefix() . '.markets.index', compact('hSCodes', 'markets'));
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
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $buy = request('buy_request');
        return view(\Route::current()->getPrefix() . '.markets.create', compact('hSCodes', 'governorates', 'buy'));
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
            'HSCode_ID' => 'required|' . (requestUri() == 'markets' ? 'exists:hscode' : 'exists:ptools_types,id'),
            'type' => 'sometimes|nullable|string',
            'photo' => 'sometimes|nullable|image',
            'amount' => 'sometimes|nullable|string',
            'package' => 'sometimes|nullable|string',
            'specs' => 'sometimes|nullable|string',
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
                $photo = request()->file('photo') ? request()->file('photo')->store('markets') : 'images/default.jpg';
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
            \Log::error('storing ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('success', 'error');
        }
        return back()->with(compact('success', 'error'));
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
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        return view('admin.markets.create', compact('market', 'hSCodes', 'governorates'));
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
        try {
            \DB::transaction(function () use ($marketData, $marketUser, $marketTransport) {
                $photo = request()->file('photo') ? request()->file('photo')->store('markets') : 'images/default.jpg';
                $data = [
                    'type_id' => requestUri() == 'markets' ? 1 : 2,
                    'entryUser' => auth()->id(),
                ];

                if ($photo) {
                    $data += compact('photo');
                }
                $market->update($data + $marketData);
                if ($marketUser) {
                    $market->user()->createOrUpdate($marketUser);
                }

                if ($marketTransport) {
                    $market->transport()->createOrUpdate($marketTransport);
                }
            });
            $success = 'تم التعديل بنجاح';
        } catch (\Exception $e) {
            \Log::error('updating ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('success');
        }
        return back()->with(compact('success'));
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
