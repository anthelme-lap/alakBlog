<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Mail\ConfirmEmailRegister;
use DateTimeImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }

    public function confirm($activate_code){

        $user_activate_code = DB::table('users')->where('activate_code', $activate_code)->get();
       
        if($user_activate_code){
            User::where('activate_code', $activate_code)
                ->update(['isVerified'=> 1, 'email_verified_at'=> new DateTimeImmutable()]);
            
        }
        

       
        
        return view('emails.confirm', compact('user_activate_code'));
    }

    public function login()
    {
        return view('users.login');
    }

    public function handleRegister(UserRequest $request){

    $user =   User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'activate_code' => Str::random(30),
            'isVerified' => 0
        ]);

        // Envoie de mail 
        Mail::to($user)->send(new ConfirmEmailRegister($user));
        return redirect()->route('login')->with('success','Votre compte a été créé avec succès.');
    }

    public function handleLogin(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('danger', 'Mauvais identifiant ou mot de passe.');
 
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
