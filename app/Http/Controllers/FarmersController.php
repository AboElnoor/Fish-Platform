<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmersController extends Controller
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
     * Specify the form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'FishFarmer_ID' => 'sometimes',
            'FishFarmerName' => 'required|string',
            'Email' => 'required|string|email',
            'NationalNo' => 'required|numeric',
            'Mob' => 'required|numeric',
            'Phone' => 'sometimes',
            'Memer' => 'sometimes|nullable',
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
        ];
        $data += $request->validate($this->rules());
        Farmer::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Farmer $farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {
        //
    }
}
