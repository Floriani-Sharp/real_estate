<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'     => 'required|email|unique:users,email' ,
            'role'      => ['required' , Rule::in(['owner' , 'tenant'])] ,
            'password'  => 'required|string|min:8|confirmed'
        ]);

        
        $user = User::create([
            'email'     => $request->email ,
            'password'  => bcrypt($request->password) ,
            'role'      => $request->role
        ]);

        if ($user) {
            if (Auth::attempt(['email' => $user->email , 'password' => $request->password])) {
                return redirect()->intended(route('home'));
            } else {
                return redirect()->back()->with(['error' => "Something went wrong"]);
            }
        }
        else {
            return redirect()->back()->with(['error' => "Something went wrong"]);
        }
            
        
    }
}
