<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
        public function Register(){
            return view('Login.Register');
        }

        public function store(Request $request)
    {
        UserDetails::create([
            'title'    => $request->title,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'phone'    => $request->phone,
            'course'   => $request->course,
            'gender'   => $request->gender,
            'date_of_birth'=> $request->date_of_birth,
            'address'  => $request->address,
        ]);

        Toastr::success('Registred Successfully', 'Success');

        return redirect('/login');
    }
   
    public function login(){
        return view('Login.Login');
    }

  public function loginAut(Request $request)
{
    $UserDetail = UserDetails::where('email', $request->email)
                    ->where('password', $request->password)
                    ->first();

    if (!$UserDetail) {

        Toastr::error('Invalid Email or Password', 'Error');

        return back();
    }

    if ($UserDetail->otp != $request->otp) {

        Toastr::error('Invalid OTP', 'Error');

        return back();
    }

    session([
        'id'    => $UserDetail->id,
        'title' => $UserDetail->title,
        'name'  => $UserDetail->name,
        'email' => $UserDetail->email,
        'role'  => $UserDetail->role,
        'course' => $UserDetail->course,
    ]);

    // Clear OTP after successful login
    $UserDetail->otp = null;
    $UserDetail->save();

    Toastr::success('Login Successful', 'Success');

    return redirect('/dashboard');
}
  public function logout()
    {
        session()->flush();

        Toastr::success('Logout Successful', 'Success');

        return redirect('/login');
    }


public function sendOtp(Request $request)
{
    $user = UserDetails::where('email', $request->email)
                ->where('password', $request->password)
                ->first();

    if(!$user)
    {
        return response()->json([
            'status' => false,
            'message' => 'Invalid Email or Password'
        ]);
    }

    $otp = rand(100000,999999);

    $user->otp = $otp;
    $user->save();

    Mail::raw("Your OTP is: ".$otp, function($message) use ($user){
        $message->to($user->email)
                ->subject('Login OTP');
    });

    return response()->json([
        'status' => true,
        'message' => 'OTP sent successfully'
    ]);
}
    
}
