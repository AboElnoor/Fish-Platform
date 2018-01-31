<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\HSCode;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $hSCodes = HSCode::whereColumn('HSCode_ID', 'MainHSCode')->pluck('HS_Aname', 'HSCode_ID');
        $governorates = Governorate::all()->pluck('Governorate_Name_A', 'Governorate_ID');
        $locals = old('Governorate_ID') ?
            Governorate::find(old('Governorate_ID'))->localities->pluck('Locality_Name_A', 'Locality_ID') : null;
        return view('auth.register', compact('hSCodes', 'governorates', 'locals'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'FullName' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'Governorate_ID' => 'required|exists:governorate',
            'Locality_ID' => 'required|exists:locality',
            'HSCode_ID.*' => 'required|exists:hscode,HSCode_ID',
            'sms' => 'sometimes',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return \DB::transaction(function () use ($data) {
            $hSCodes = $data['HSCode_ID'];
            unset($data['HSCode_ID']);
            $data['password'] = bcrypt($data['password']);
            $data['UserType'] = 2;
            $data['EntDate'] = Carbon::now();
            $user = User::create($data);
            $user->hSCodes()->attach($hSCodes);
            return $user;
        });
    }
}
