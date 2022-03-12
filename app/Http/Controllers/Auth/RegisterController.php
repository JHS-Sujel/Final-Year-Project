<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Notifications\VerificationSms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:14', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $code = random_int(10000, 99999);
        $full_name = $data['first_name'] . ' ' . $data['last_name'];
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'slug' => Str::slug($full_name),
            'email' => $data['email'],
            'phone' => '+88'.$data['phone'],
            'password' => Hash::make($data['password']),
            'verification_code' => $code,
            'expired_at' => time() + (30 * 60),
            'role_id' => 2,
            'api_token' => Hash::make(Str::random(60)),
        ]);

        if ($user) {
            Mail::to($user->email)->send(new VerificationMail($user));
            $user->notify(new VerificationSms($code));
            return $user;
        }
    }

    // Register
    public function showRegistrationForm()
    {
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];

        return view('/auth/register', [
            'pageConfigs' => $pageConfigs
        ]);
    }
}
