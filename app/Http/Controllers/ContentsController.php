<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContentType $type = null)
    {
        $articles = $type ? $type->articles()->latest('id')->paginate(10) : Content::latest('id')->paginate(10);
        return view(\Route::current()->getPrefix() . '.contents.index', compact('articles', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ContentType::pluck('name', 'id');
        return view('admin.contents.create', compact('types'));
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'subject' => 'required|string',
            'photo' => 'sometimes|file',
            'type' => 'required|exists:content_types,id',
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
        $photo = request()->file('photo')->store('contents');
        $subject = prepareHTMLInput(request('subject'));

        Content::create(compact('photo', 'subject') + $data);

        return back()->with('success', 'تم انشاء المقال بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return view(\Route::current()->getPrefix() . '.contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        $types = ContentType::pluck('name', 'id');
        return view('admin.contents.create', compact('content', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $data = $request->validate($this->rules());
        $photo = request()->file('photo') ? request()->file('photo')->store('contents') : '';
        $subject = prepareHTMLInput(request('subject'));
        $data = compact('photo', 'subject') + $data;
        $content->update(array_filter($data));

        return back()->with('success', 'تم تحديث المقال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
        $success = 'تم الحذف بنجاح';
        return back()->with(compact('success'));
    }
}
