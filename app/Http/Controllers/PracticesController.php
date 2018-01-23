<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Video;
use Illuminate\Http\Request;

class PracticesController extends Controller
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
        $practices = Practice::all();
        $videos = Video::all();

        if (requestUri() == 'api') {
            return compact('practices', 'videos');
        }
        return view('practices.create', compact('practices', 'videos'));
    }

    /**
     * Specify the practices form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'title' => 'required|string',
            'message' => 'sometimes|nullable|string',
            'photo' => 'sometimes|nullable|image',
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
        $photo = (request()->file('photo')) ? request()->file('photo')->store('photos') : 'photos/default.jpg';

        Practice::create(compact('photo') + $data);
        $success = 'تمت الااضافة بنجاح';

        if (requestUri() == 'api') {
            return compact('success');
        }
        return back()->with(compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice)
    {
        $practices = Practice::all();
        $videos = Video::all();

        if (requestUri() == 'api') {
            return compact('practices', 'practice', 'videos');
        }
        return view('practices.create', compact('practices', 'practice', 'videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practice $practice)
    {
        $data = $request->validate($this->rules());
        $photo = request()->file('photo') ? request()->file('photo')->store('photos') : 'photos/default.jpg';

        $practice->update(compact('photo') + $data);
        $success = 'تم التحديث بنجاح';

        if (requestUri() == 'api') {
            return compact('success');
        }
        return back()->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practice $practice)
    {
        $practice->delete();
        $success = 'تم الحذف بنجاح';

        if (requestUri() == 'api') {
            return compact('success');
        }
        return back()->with(compact('success'));
    }
}
