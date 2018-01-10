<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Farmer;
use App\Models\Governorate;
use App\Models\Locality;
use App\Models\Village;
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
        $farmers = Farmer::latest()->paginate(10);
        return view('farms.index', compact('farmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $locals = Locality::all()->pluck('Locality_Name_A', 'Locality_ID');
        $villages = Village::all()->pluck('Village_Name_A', 'Village_ID');
        return view('farms.create', compact('governorates', 'locals', 'villages'));
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'Governorate_ID' => 'required|numeric',
            'Locality_ID' => 'required|numeric',
            'Village_ID' => 'required|numeric',
            'Address' => 'sometimes',
            'OwnerType' => 'sometimes',
            'OwnerID' => 'sometimes',
            'FarmSize' => 'sometimes',
            'EmpA' => 'sometimes',
            'EmpB' => 'sometimes',
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
            'FishFarmer_ID' => auth()->id(),
        ];
        $data += $request->validate($this->rules());
        Farm::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        return view('farms.show', compact('farm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        //
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
        //
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
