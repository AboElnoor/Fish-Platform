<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\HSCode;
use App\Models\UserType;
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
        if (auth()->user()->UserType != 1) {
            return redirect()->route('admin.admin');
        }

        if (requestUri() == 'admins') {
            $users = User::where('UserType', '<>', 2)->paginate(10);
        } else {
            $users = User::where('UserType', 2)->paginate(10);
        }

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
        if (requestUri() == 'admins') {
            $types = UserType::pluck('UserType_Name', 'UserType');
        }
        $locals = old('Governorate_ID') ?
        Governorate::find(old('Governorate_ID'))->localities->pluck('Locality_Name_A', 'Locality_ID') : null;
        return view('admin.users.create', compact('hSCodes', 'governorates', 'locals', 'types'));
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
            'phone' => 'required|numeric|unique:users',
            'email' => 'sometimes|nullable|string',
            'password' => 'required|string',
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

                if (empty($data['UserType'])) {
                    $data['UserType'] = 2;
                }
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
        if (auth()->id() != $user->User_ID && !\Route::current()->getPrefix()) {
            return back()->with('error', 'عفوا ﻻ تملك صلاحية الوصول لهذه الصفحة');
        }
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
        if (auth()->id() != $user->User_ID && !\Route::current()->getPrefix()) {
            return back()->with('error', 'عفوا ﻻ تملك صلاحية الوصول لهذه الصفحة');
        }
        $hSCodes = HSCode::whereColumn('HSCode_ID', 'MainHSCode')->pluck('HS_Aname', 'HSCode_ID');
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        if (requestUri() == 'admins') {
            $types = UserType::pluck('UserType_Name', 'UserType');
        }
        $locals = $user->Governorate_ID ?
        Governorate::find($user->Governorate_ID)->localities->pluck('Locality_Name_A', 'Locality_ID') : null;

        return view(
            \Route::current()->getPrefix() . '.users.create',
            compact('user', 'hSCodes', 'governorates', 'locals', 'types')
        );
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
            'phone' => 'required|string|numeric', Rule::unique('users')->ignore($user->User_ID, 'User_ID'),
            'email' => 'sometimes|nullable|string',
            'password' => 'sometimes|nullable|string',
            'HSCode_ID.*' => 'sometimes|nullable|exists:hscode,HSCode_ID',
        ];
        $data = $request->validate($rules + $this->rules());
        try {
            \DB::transaction(function () use ($user, $data) {
                $hSCodes = $data['HSCode_ID'];
                unset($data['HSCode_ID']);
                if (!empty($data['password'])) {
                    $data['password'] = bcrypt($data['password']);
                }

                if (empty($data['UserType'])) {
                    $data['UserType'] = 2;
                }

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
