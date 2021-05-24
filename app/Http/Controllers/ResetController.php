<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ResetController extends Controller
{
    public function Reset(Request $request ){
        if(!$this->validateEmail($request->email)){
            return $this->failedResponce();
        }

        $this->send($request->email);
        return $this->successResponce();
    }

    public function send($email){
        $token = $this->createToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token));
    }

    public function createToken($email){
        if($oldToken = DB::table('password_resets')->where('email', $email)->first()){
            return $oldToken->token;
        }
        $token = Str::random(60);
        $this->saveToken($token,$email);
        return $token;
    }
    public function saveToken($token,$email){
        DB::table('password_resets')->insert([
            'email'=>$email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);
    }
   
    public function validateEmail($email){
        return !!User::where('email',$email)->first();
    }
   
    public function failedResponce(){
        return response()->json([
            'error'=>'Email does\'nt found on our database'
        ],Response::HTTP_NOT_FOUND);
    } 
    public function successResponce(){
        return response()->json([
            'data'=>'Reset Email is send successfully, check your inbox. '
        ],Response::HTTP_OK);
    } 
   
}
