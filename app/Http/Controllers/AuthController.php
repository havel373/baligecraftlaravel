<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Penjual;
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

    public function penjualIndex(){
        return view('pages.penjual.auth.main');
    }

    public function PenjualLogin(Request $request){
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
        $check = Penjual::where("email", "=", $request->email)->first();
        if ($check) {
            if (Auth::guard('penjual')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Welcome back ' . Auth::guard('penjual')->user()->nama,
                        'callback' => route('penjual.index'), 
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
    
    public function adminIndex(){
        return view('pages.admin.auth.main');
    }

    public function adminLogin(Request $request){
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
        $check = Admin::where("email", "=", $request->email)->first();
        if ($check) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Welcome back ' . Auth::guard('admin')->user()->nama,
                        'callback' => route('admin.index'), 
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

    public function adminLogout(){
        $user = Auth::guard('admin')->user();
        Auth::guard('admin')->logout($user);
        return redirect()->route('login');
    }
}
