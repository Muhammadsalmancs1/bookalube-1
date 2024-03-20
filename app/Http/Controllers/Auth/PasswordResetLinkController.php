<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class PasswordResetLinkController extends Controller
{



    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email', 'exists:users,email'],
            ]);

            $user = User::where('email', $request->email)->first();

            Password::deleteToken($user);
            $token = Password::createToken($user);

            $link = route('password.reset', [$token, 'email' => $request->email]);
            $arr = array('{$link}' => $link);
            $emailfrom = env('MAIL_FROM_ADDRESS') ?? 'info@t2jb.com';
            $to = $request->email;
            $subject = 'Password Reset';
            $maildata = [
                'token' => $link,
            ];
            Mail::send('auth.passwords.resetlink', $maildata, function ($message) use ($emailfrom, $to, $subject) {
                $message->from($emailfrom, 'Book A Lube');
                $message->to($to);
                $message->subject($subject);
            });
            return back()->with('success', 'Password Reset Link Sent Successfully.');
        } catch (\Throwable $th) {
            return back()->withErrors(['msg' => $th->getMessage()]);
        }


        // dd($status);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );

        // return $status == Password::RESET_LINK_SENT
        //     ? back()->with('status', __($status))
        //     : back()->withInput($request->only('email'))
        //     ->withErrors(['email' => __($status)]);
    }
}
