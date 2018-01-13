<?php

namespace App\Http\Controllers;

use App\Models\CompanyManager;
use Illuminate\Http\Request;

class ManagersController extends Controller
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
     * @param  CompanyManager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyManager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CompanyManager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyManager $manager)
    {
        return $manager;
    }

    /**
     * Specify the manager form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'EmpName' => 'required|string',
            'Job' => 'required|string',
            'Mob' => 'required|numeric',
            'Email' => 'sometimes|nullable|string|email',
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CompanyManager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyManager $manager)
    {
        $data = $request->validate($this->rules());
        $manager->update($data);
        $success = 'تم تعديل الموظف بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CompanyManager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyManager $manager)
    {
        $manager->delete();
        $success = 'تم حذف مستلزمات الإنتاج بنجاح';
        return back()->with(compact('success'));
    }
}
