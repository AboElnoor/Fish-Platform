<?php

namespace App\Http\Controllers;

use App\Models\HSCode;
use App\Models\Price;
use App\Models\Unit;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::latest('PriceDate')->paginate(10);
        return view('prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hSCodes = HSCode::all()->pluck('HS_Aname', 'HSCode_ID');
        $units = Unit::all();
        return view('prices.create', compact('hSCodes', 'units'));
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'HSCode_ID' => 'required|exists:hscode,HSCode_ID',
            'Market_ID' => 'sometimes|nullable|numeric',
            'PriceDate' => 'sometimes|nullable|date',
            'PriceMin' => 'sometimes|nullable|numeric',
            'PriceMax' => 'sometimes|nullable|numeric',
            'Unit_ID' => 'sometimes|nullable|exists:Unit,Unit_ID',
            'Weights' => 'sometimes|nullable|string',
            'Weight' => 'sometimes|nullable|string',
            'Desc_A' => 'sometimes|nullable|string',
            'Desc_E' => 'sometimes|nullable|string',
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
        $data = [
            'EntryUser' => auth()->id(),
            'UpdateUser' => auth()->id(),
            'PriceAverage' => array_sum($request->only('PriceMin', 'PriceMax')) / 2,
        ];
        $data += $request->validate($this->rules());
        Price::create(array_except($data, ['Unit_ID', 'Weights']));
        $success = 'تم انشاء السوق بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $hSCode->delete();
        $success = 'تم حذف المنتج بنجاح';
        return back()->with(compact('success'));
    }
}
