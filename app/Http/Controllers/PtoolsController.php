<?php

namespace App\Http\Controllers;

use App\Models\Ptool;
use App\Models\PtoolsType;
use Illuminate\Http\Request;

class PtoolsController extends Controller
{
    /**
     * Resource constructor
     */
    public function __construct()
    {
        $this->types = PtoolsType::all()->pluck('name', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->types;
        $markets = Ptool::latest('id');

        return view(\Route::current()->getPrefix() . '.ptools.index', compact('types', 'markets'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $types = $this->types;
        $markets = Ptool::latest('id');
        if (request('type')) {
            $markets->where('type', request('type'));
        }

        if (request('buy_request')) {
            $markets->where('buy_request', request('buy_request'));
        }

        return view('admin.ptools.index', compact('markets', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->types;
        $buy = request('buy_request');
        return view('admin.ptools.create', compact('types', 'buy'));
    }


    /**
     * Specify the form's rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'buy_request' => 'sometimes|nullable',
            'type' => 'required|string|exists:ptools_types,id',
            'photo' => 'sometimes|nullable|image',
            'name' => 'sometimes|nullable|string',
            'amount' => 'required|string',
            'description' => 'sometimes|nullable|string',
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
        $photo = request()->file('photo')->store('ptools');

        if($photo) {
            $data = compact('photo') + $data;
        }
        Ptool::create($data);

        $success = 'تم الانشاء بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ptool  $ptool
     * @return \Illuminate\Http\Response
     */
    public function show(Ptool $ptool)
    {
        return view(\Route::current()->getPrefix() . '.ptools.show', compact('ptool'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ptool  $ptool
     * @return \Illuminate\Http\Response
     */
    public function edit(Ptool $ptool)
    {
        $types = $this->types;
        return view('admin.ptools.create', compact('ptool', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ptool  $ptool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ptool $ptool)
    {
        $data = $request->validate($this->rules());
        $photo = request()->file('photo')->store('ptools');

        if($photo) {
            $data = compact('photo') + $data;
        }
        $ptool->update($data);

        $success = 'تم التعديل بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ptool  $ptool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ptool $ptool)
    {

        $ptool->delete();
        $success = 'تم الحذف بنجاح';
        return back()->with(compact('success'));
    }
}
