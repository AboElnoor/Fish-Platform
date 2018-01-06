<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Governorate;
use App\Models\HSCode;
use App\Models\Locality;
use App\Models\Membership;
use App\Models\Village;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
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
        $types = ActivityType::where('ActivityTypeGroup_ID', '41')->get()->pluck('AName', 'ActivityType_ID');
        $banks = Bank::all();
        $memberships = Membership::all();
        $hscodes = HSCode::all()->pluck('HS_Aname', 'HSCode_ID');
        return view('companies.create', compact(
            'governorates',
            'locals',
            'villages',
            'types',
            'banks',
            'memberships',
            'hscodes'
        ));
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
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
