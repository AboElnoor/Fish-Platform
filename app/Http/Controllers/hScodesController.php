<?php

namespace App\Http\Controllers;

use App\Models\FarmerHSCode;
use Illuminate\Http\Request;

class hScodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  FarmerHSCode  $hSCode
     * @return \Illuminate\Http\Response
     */
    public function show(FarmerHSCode $hSCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  FarmerHSCode  $hSCode
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmerHSCode $hSCode)
    {
        return $hSCode;
    }

    /**
     * Specify the HSCode form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'HSCode_ID' => 'required|exists:hscode',
            'cropMonth' => 'required|string',
            'Area' => 'sometimes|nullable|string',
            'PoolCount' => 'sometimes|nullable|string',
            'PoolAvrg' => 'sometimes|nullable|string',
            'Notes' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  FarmerHSCode  $hSCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FarmerHSCode $hSCode)
    {
        $data = $request->validate($this->rules());
        $hSCode->update($data);
        $success = 'تم تعديل مستلزمات الانتاج بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FarmerHSCode  $hSCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmerHSCode $hSCode)
    {
        $hSCode->delete();
        $success = 'تم حذف بيانات الإنتاج بنجاح';
        return back()->with(compact('success'));
    }
}
