<?php

namespace App\Http\Controllers;

use App\Models\CompanyType;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleriesController extends Controller
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
        $categories = CompanyType::all()->pluck('FishCompanyType_Name', 'FishCompanyType_ID');
        return view('admin.galleries.create', compact('categories'));
    }

    /**
     * Specify the practices form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'FishCompanyType_ID' => 'required|nullable|numeric',
            'photo' => 'required|image',
            'title' => 'required|string',
            'subject' => 'required|string',
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
        $photo = request()->file('photo')->store('galleries');

        if ($photo) {
            $data = compact('photo') + $data;
        }
        Gallery::create($data);
        $success = 'تمت الاضافة بنجاح';

        return back()->with(compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
