<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function authenticate(Request $request)
    {

        $request->validate([
            'username' => ['required',],
            'password' => ['required'],


        ], [
            'username.required' => 'Username cannot be blank.',
            'password.required' => 'Password cannot be blank.',

        ]);




        $credentials = $request->only('username', 'password');
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {

            return redirect()->route('home.index')
                ->withSuccess('Signed in');
        } else {
            return back()->with('incorect', 'Incorrect username or password.
            ');
        }
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
