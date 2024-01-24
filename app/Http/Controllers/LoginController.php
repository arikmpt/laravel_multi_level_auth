<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.index');
    }

    public function login(Request $request){
        try {
            if(Auth::attempt(['email' => $request->email,'password' => $request->password])) {
                if(Auth::user()->role->name === 'admin')
                {
                    return redirect()->route('admin.dashboard.index');
                }

                if(Auth::user()->role->name === 'operator')
                {
                    return redirect()->route('operator.dashboard.index');
                }

                return redirect()->route('user.dashboard.index');
            }

            return redirect()->back()->with('danger','invalid password or email');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Fatal Error!');
        }
    }
}
