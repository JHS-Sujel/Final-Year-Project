<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Notifications\VerificationSms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerifyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |  Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling code verification for any
    | user that recently registered with the application. Codes may also
    | be re-sent if the user didn't receive the original email  message or SMS.
    |
    */

    /**
     * Where to redirect users after verification.
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
    }


    public function index()
    {
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $user = User::find(Auth::id());
        $now = time();

        $code = $request->code;

        if ($now > $user->expired_at) {
            return redirect()->route('verify.index')->with(['expired']);
        }

        if ($user->verification_code != $code) {
            return redirect()->route('verify.index')->with(['not_matched']);
        }

        $user->verified = 1;
        $user->save();
        return redirect($user->role_id == 1 ? '/admin' : '')->with(['success' => 'Verification is successfully done']);
    }


    public function resend()
    {
        $code = random_int(10000, 99999);
        $expired_at = time() + (30 * 60);

        $user = User::find(Auth::id());
        $user->update([
            'verification_code' => $code,
            'expired_at' => $expired_at
        ]);

        Mail::to($user->email)->send(new VerificationMail($user));
        $user->notify(new VerificationSms($code));

        return redirect()->route('verify.index');
    }
}
