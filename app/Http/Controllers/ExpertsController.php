<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experts = Expert::latest();

        return view(\Route::current()->getPrefix() . '.experts.index', compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.experts.create');
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required|string',
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
            'entryUser' => auth()->id(),
        ];
        $data += $request->validate($this->rules());
        $photo = request()->file('photo') ? request()->file('photo')->store('experts') : 'images/default.jpg';

        Expert::create(compact('photo') + $data);

        return back()->with('success', 'تم انشاء السؤال بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function show(Expert $expert)
    {
        return view('admin.experts.show', compact('expert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function edit(Expert $expert)
    {
        return view('admin.experts.show', compact('expert'));
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    public function adminRules()
    {
        return [
            'answer' => 'required|string',
            'photo' => 'sometimes|nullable|image',
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expert $expert)
    {
        $data = [
            'UpdateUser' => auth()->id(),
            'updated_at' => Carbon::now(),
        ];
        $data += $request->validate($this->adminRules());
        $photo = request()->file('photo') ? request()->file('photo')->store('experts') : 'images/default.jpg';

        $expert->update(compact('photo') + $data);

        return back()->with('success', 'تم الاجابة على السؤال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expert $expert)
    {
        $price->delete();
        $success = 'تم حذف السؤال بنجاح';

        return back()->with(compact('success'));
    }
}
