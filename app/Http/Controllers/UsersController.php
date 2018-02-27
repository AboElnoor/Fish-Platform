<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\HSCode;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hSCodes = HSCode::whereColumn('HSCode_ID', 'MainHSCode')->pluck('HS_Aname', 'HSCode_ID');
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $locals = old('Governorate_ID') ?
            Governorate::find(old('Governorate_ID'))->localities->pluck('Locality_Name_A', 'Locality_ID') : null;
        return view('admin.users.create', compact('hSCodes', 'governorates', 'locals'));
    }

    /**
     * Specify the practices form's rules.
     *
     * @return array
     */
    private function rules()
    {
        return [
            'FullName' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:20|numeric|unique:users',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'Governorate_ID' => 'required|exists:governorate',
            'Locality_ID' => 'required|exists:locality',
            'HSCode_ID.*' => 'required|exists:hscode,HSCode_ID',
            'sms' => 'sometimes',
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
        try {
            \DB::transaction(function () use ($data) {
                $hSCodes = $data['HSCode_ID'];
                unset($data['HSCode_ID']);
                $data['password'] = bcrypt($data['password']);
                $data['UserType'] = 2;
                $data['EntDate'] = Carbon::now();
                $user = User::create($data);
                $user->hSCodes()->attach($hSCodes);
            });
            $success = 'تمت الاضافة بنجاح';
        } catch (\Exception $e) {
            \Log::error('storing ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        return back()->with(compact('success', 'error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $hSCodes = HSCode::whereColumn('HSCode_ID', 'MainHSCode')->pluck('HS_Aname', 'HSCode_ID');
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $locals = $user->Governorate_ID ?
            Governorate::find($user->Governorate_ID)->localities->pluck('Locality_Name_A', 'Locality_ID') : null;

        return view('admin.users.create', compact('user', 'hSCodes', 'governorates', 'locals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'username' => 'required|string|max:255', Rule::unique('users')->ignore($user->User_ID, 'User_ID'),
            'phone' => 'required|string|numeric', Rule::unique('users')->ignore($user->User_ID, 'User_ID'),
            'email' => 'required|string|max:255', Rule::unique('users')->ignore($user->User_ID, 'User_ID'),
            'password' => 'sometimes|nullable|string|min:6',
            'HSCode_ID.*' => 'sometimes|nullable|exists:hscode,HSCode_ID',
        ];
        $data = $request->validate($rules + $this->rules());
        try {
            \DB::transaction(function () use ($user, $data) {
                $hSCodes = $data['HSCode_ID'];
                unset($data['HSCode_ID']);
                if (empty($data['password'])) {
                    $data['password'] = bcrypt($data['password']);
                }
                $data['UserType'] = 2;
                $data['EntDate'] = Carbon::now();
                $user->update(array_filter($data));
                if ($hSCodes) {
                    $user->hSCodes()->sync($hSCodes, false);
                }
            });
            $success = 'تم التعديل بنجاح';
        } catch (\Exception $e) {
            \Log::error('storing ' . \Route::current()->getPrefix(), compact('e'));
            $error = 'حدث خطأ يرجى المحاولة مرة أخرى';
        }

        return back()->with(compact('success', 'error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $success = 'تم الحذف بنجاح';
        return back()->with(compact('success'));
    }
}
