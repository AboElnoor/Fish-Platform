<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\HSCode;
use App\Models\Market;
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
        $hSCodes = $this->hSCodes;
        $markets = Market::latest('startDate');
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
        $markets = Market::latest('startDate');
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

        $markets = $markets->paginate(10);
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
        return view('admin.markets.create', compact('hSCodes', 'governorates', 'buy'));
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'buy_request' => 'nullable',
            'provider' => 'required|string',
            'name' => 'sometimes|nullable|string',
            'mobile' => 'sometimes|nullable|numeric',
            'email' => 'sometimes|nullable|email',
            'fax' => 'sometimes|nullable|numeric',
            'startDate' => 'sometimes|nullable|date',
            'endDate' => 'sometimes|nullable|date',
            'HSCode_ID' => 'sometimes|nullable|numeric',
            'type' => 'sometimes|nullable|string',
            'amount' => 'sometimes|nullable|string',
            'package' => 'sometimes|nullable|string',
            'specs' => 'sometimes|nullable|string',
            'certificates' => 'sometimes|nullable|string',
            'photo' => 'sometimes|nullable|image',
            'place' => 'sometimes|nullable|boolean',
            'Governorate_ID' => 'sometimes|nullable|numeric',
            'Locality_ID' => 'sometimes|nullable|numeric',
            'Village_ID' => 'sometimes|nullable|numeric',
            'transport' => 'sometimes|nullable|boolean',
            'avarage' => 'sometimes|nullable|string',
            'price' => 'sometimes|nullable|string',
            'payment' => 'sometimes|nullable|string',
            'more' => 'sometimes|nullable|string',
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
        $data = $request->validate($this->rules());
        $photo = request()->file('photo') ? request()->file('photo')->store('markets') : 'images/default.jpg';

        Market::create(compact('photo') + $data);

        $success = 'تم الانشاء بنجاح';
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
        $data = $request->validate($this->rules());
        $market->update($data);

        $success = 'تم التعديل بنجاح';
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
        return back()->with(compact('success'));
    }
}
