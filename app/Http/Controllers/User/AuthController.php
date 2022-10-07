<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        return view('pages.auth.main');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $check = User::where("email", "=", $request->email)->first();
        if ($check) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Welcome back ' . Auth::user()->username,
                        'callback' => route('home'), 
                    ]);
            } else{
                return response()->json([
                    'alert' => 'error',
                    'message' => 'password salah', 
                ]);
            }
        } else{
            return response()->json([
            'alert' => 'error',
            'message' => 'Email tidak ditemukan.',
            ]);
        }
    }

    public function logout(){
        $user = Auth::user();
        Auth::logout($user);
        return redirect()->route('home');
    }
}
