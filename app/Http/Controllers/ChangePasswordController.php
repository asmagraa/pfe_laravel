<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
   public function process(ChangePasswordRequest $request)
   {
       //if the token and the email both are correct (have change the password)
        return $this->getPasswordResetTableRow($request)->count()> 0 ? $this->changePassword($request) : 
        $this->tokenNotFoundResponse();
   }
   private function getPasswordResetTableRow($request)
   {
       return DB::table('password_resets')->where(['email' => $request->email,'token'
       =>$request->token]);
   }

   private function tokenNotFoundResponse()
   {
     return response()->json(['error' => 'Token or email is incorrect'],
     Response::HTTP_UNPROCESSABLE_ENTITY);
   }


   private function changePassword($request)
   {
     $users = User::whereEmail($request->email)->first();
     $users->update(['password'=> bcrypt($request->password)]);
      $this->getPasswordResetTableRow($request)->delete(); //delete from db
     return response()->json(['data'=>'Password Successfully Changed'],
     Response::HTTP_CREATED);
   }
}
