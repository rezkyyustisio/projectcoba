<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function proses(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi',
        ];
        $validator = Validator::make($request->all(), [
            'email'   => 'required',
            'password' => 'required|min:4'
        ], $messages);
 
        if ($validator->fails()) {
            return redirect()
                        ->route('login')
                        ->withErrors($validator)
                        ->withInput();
        }


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            
            if($user->hasRole('admin')){
                return redirect()->route('admin.dashboard');
            } 
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        if(Auth::check()) 
        {
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->route('login');
        }
    }
}
