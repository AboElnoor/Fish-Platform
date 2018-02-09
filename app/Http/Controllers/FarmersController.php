<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Governorate;
use App\Models\HSCode;
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
        session()->forget('farmer');
        $farmers = Farmer::latest()->paginate(10);
        return view('admin.farmers.index', compact('farmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $hscodes = HSCode::all()->pluck('HS_Aname', 'HSCode_ID');
        $farmer = session('farmer', null);

        return view(\Route::current()->getPrefix() . '.farmers.create', compact('governorates', 'hscodes', 'farmer'));
    }

    /**
     * Specify the form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'FishFarmerName' => 'required|string',
            'Email' => 'sometimes|nullable|string|email',
            'NationalNo' => 'sometimes|nullable|numeric',
            'Mob' => 'sometimes|nullable|numeric',
            'Phone' => 'sometimes|nullable|numeric',
            'Memer' => 'sometimes|nullable|string',
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
        $farmer = Farmer::create($data);
        if (trim(\Route::current()->getPrefix(), '/') == 'admin') {
            session(compact('farmer'));
        }

        $success = 'تم انشاء المزارع بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Specify the farm form's rules.
     *
     * @return array
     */
    private function farmRules()
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
     * Add Farm informstion to Farmer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function addFarm(Request $request, Farmer $farmer)
    {
        $data = $request->validate($this->farmRules());
        $farmer->farms()->create($data);
        session(compact('farmer'));

        $success = 'تم انشاء المزرعة بنجاح';
        session()->flash('success', $success);
        return compact('success');
    }

    /**
     * Specify the HSCode form's rules.
     *
     * @return array
     */
    private function hSCodeRules()
    {
        return [
            'HSCode_ID' => 'required|exists:hscode',
            'cropMonth' => 'required|string',
            'Area' => 'sometimes|nullable|string',
            'PoolCount' => 'sometimes|nullable|string',
            'PoolAvrg' => 'sometimes|nullable|string',
            'Notes' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Add HSCode informstion to Farmer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function addHSCode(Request $request, Farmer $farmer)
    {
        $data = $request->validate($this->hSCodeRules());
        $farmer->hSCodes()->attach([$data['HSCode_ID'] => array_except($data, 'HSCode_ID')]);
        session(compact('farmer'));

        $success = 'تم انشاء بيانات الانتاج بنجاح';
        session()->flash('success', $success);
        return compact('success');
    }

    /**
     * Specify the Source form's rules.
     *
     * @return array
     */
    private function sourceRules()
    {
        return [
            'SourceS1' => 'sometimes|nullable|string',
            'Counts1' => 'sometimes|nullable|string',
            'SourceS2' => 'sometimes|nullable|string',
            'Counts2' => 'sometimes|nullable|string',
            'SourceS3' => 'sometimes|nullable|string',
            'Counts3' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Add Source informstion to Farmer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function addSource(Request $request, Farmer $farmer)
    {
        $data = $request->validate($this->sourceRules());
        $farmer->source()->updateOrCreate([], $data);
        session(compact('farmer'));

        $success = 'تم انشاء بيانات مستلزمات الانتاج بنجاح';
        session()->flash('success', $success);
        return compact('success');
    }

    /**
     * Specify the Client form's rules.
     *
     * @return array
     */
    private function clientRules()
    {
        return [
            'Factory' => 'sometimes|nullable',
            'Supplier' => 'sometimes|nullable',
            'Trader' => 'sometimes|nullable',
            'Hotel' => 'sometimes|nullable',
            'WTrader' => 'sometimes|nullable',
            'School' => 'sometimes|nullable',
            'Strader' => 'sometimes|nullable',
            'agent' => 'sometimes|nullable',
            'other' => 'sometimes|nullable',
            'Clients' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Add Client informstion to Farmer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function addClient(Request $request, Farmer $farmer)
    {
        $data = $request->validate($this->clientRules());
        $farmer->client()->updateOrCreate([], $data);
        session()->forget('farmer');

        $success = 'تم انشاء بيانات بيانات العملاء بنجاح';
        return redirect()->route('admin.farmers.index')->with(compact('success'));
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
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $hscodes = HSCode::all()->pluck('HS_Aname', 'HSCode_ID');

        return view('admin.farmers.create', compact('farmer', 'governorates', 'hscodes'));
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
        $data = [
            'UpdateUser' => auth()->id(),
        ];
        $data += $request->validate($this->rules());
        $farmer->update($data);
        session(compact('farmer'));

        $success = 'تم تعديل المزارع بنجاح';
        return back()->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {
        $farmer->delete();
        session()->forget('farmer');
        $success = 'تم حذف المزارع بنجاح';
        return back()->with(compact('success'));
    }
}
