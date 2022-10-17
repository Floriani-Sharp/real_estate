<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Authenticate user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email'     => 'required|string|exists:users,email' ,
            'password'  => 'required|string|min:8'
        ]);
        $remember = $request->remember ? true : false ;
        if (Auth::attempt(['email' => $request->email , 'password' => $request->password] , $remember)) {
            return redirect()->route('home');
        } else {
            return back()->with(['error' => "Something went wrong"]);
        }
        
    }
}
