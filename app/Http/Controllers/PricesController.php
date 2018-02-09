<?php

namespace App\Http\Controllers;

use App\Models\HSCode;
use App\Models\Price;
use App\Models\Unit;
use Illuminate\Http\Request;

class PricesController extends Controller
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
        $prices = Price::latest('PriceDate')
            ->with('hSCode', 'entryUser', 'updateUser')->paginate(10);

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('prices');
        }
        return view(\Route::current()->getPrefix() . '.prices.index', compact('prices', 'hSCodes'));
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
        $prices = Price::latest('PriceDate');
        if (request('HSCode_ID')) {
            $prices->where('HSCode_ID', request('HSCode_ID'));
        };

        if (request('Market_ID')) {
            $prices->where('Market_ID', request('Market_ID'));
        };

        if (request('fromDate') || request('toDate')) {
            $prices->whereBetween('PriceDate', [request('fromDate'), request('toDate')]);
        }

        $prices = $prices->with('hSCode', 'entryUser', 'updateUser')->paginate(10);

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('prices');
        }
        return view('admin.prices.index', compact('prices', 'hSCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hSCodes = $this->hSCodes;
        $units = Unit::pluck('Unit_Name_A', 'Unit_ID');

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('hSCodes', 'units');
        }
        return view('admin.prices.create', compact('hSCodes', 'units'));
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
            'Market_ID' => 'required|numeric',
            'PriceDate' => 'sometimes|nullable|date',
            'PriceMin' => 'required|nullable|numeric',
            'PriceMax' => 'required|nullable|numeric',
            'Unit_ID.*' => 'sometimes|nullable|exists:Unit,Unit_ID',
            'Weights.*' => 'sometimes|nullable|string',
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
        $sync = [];
        foreach (request('Unit_ID') ?? [] as $key => $value) {
            $sync[$value] = ['Weights' => request('Weights')[$key] ?? null];
        }
        try {
            \DB::transaction(function () use ($data, $sync) {
                $price = Price::create(array_except($data, ['Unit_ID', 'Weights']));
                if ($sync) {
                    $price->units()->sync($sync);
                }
            });
        } catch (Exception $e) {
            \Log::error('storing ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }
        $success = 'تم انشاء السوق بنجاح';

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('success', 'error');
        }
        return back()->with(compact('success', 'error'));
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
        $hSCodes = $this->hSCodes;
        $units = Unit::pluck('Unit_Name_A', 'Unit_ID');
        $price = Price::with('hSCode', 'entryUser', 'updateUser')->find($price->PriceDB_ID);

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('hSCodes', 'units', 'price');
        }
        return view('admin.prices.create', compact('hSCodes', 'units', 'price'));
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
        $data = [
            'UpdateUser' => auth()->id(),
            'PriceAverage' => array_sum($request->only('PriceMin', 'PriceMax')) / 2,
        ];
        $data += $request->validate($this->rules());
        $sync = [];
        foreach (request('Unit_ID') ?? [] as $key => $value) {
            $sync[$value] = ['Weights' => request('Weights')[$key] ?? null];
        }
        try {
            \DB::transaction(function () use ($price, $data, $sync) {
                $price->update(array_except($data, ['Unit_ID', 'Weights']));
                if($sync) {
                    $price->units()->sync($sync);
                }
            });
        } catch (Exception $e) {
            \Log::error('storing ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }
        $success = 'تم تحديث بيانات السوق بنجاح';

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('success', 'error');
        }
        return back()->with(compact('success', 'error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();
        $success = 'تم حذف المنتج بنجاح';

        if (trim(\Route::current()->getPrefix(), '/') == 'api') {
            return compact('success');
        }
        return back()->with(compact('success'));
    }
}
