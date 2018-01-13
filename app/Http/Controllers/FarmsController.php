<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;

class FarmsController extends Controller
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
     * @param  Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        return $farm;
    }

    private function rules()
    {
        return [
            'Governorate_ID' => 'required|exists:governorate',
            'Locality_ID' => 'required|exists:locality',
            'Village_ID' => request('Village_ID') ? 'required|exists:village' : '',
            'Address' => 'sometimes|nullable|string',
            'OwnerType' => 'sometimes|nullable|string',
            'OwnerID' => 'sometimes|nullable|string',
            'FarmSize' => 'sometimes|nullable|string',
            'EmpA' => 'sometimes|nullable|numeric',
            'EmpB' => 'sometimes|nullable|numeric',
        ];
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        $data = $request->validate($this->rules());
        $farm->update($data);
        $success = 'تم تعديل المزرعة بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        $farm->delete();
        $message = 'تم حذف المزرعة بنجاح';
        return back()->with(compact('success'));
    }
}
