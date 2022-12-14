<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helper\ApiMsg;
use App\Mail\ResetUserPassword;
use App\Models\Father;
use App\Models\ForgotPasswordCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;

class AuthForgotPasswordController extends Controller
{
    //


    public function sendEmailCode(Request $request){
        $validator = Validator($request->all(),[
            'email' => 'required|email|exists:users,email',
        ]);

        if(!$validator->fails()){
            
            ForgotPasswordCode::where('email',$request->input('email'))->delete();
            $code =  mt_rand(100000,999999);
            $forgot = new ForgotPasswordCode;
            $forgot->email = $request->input('email');
            $forgot->code = $code;
            $forgot->save();

            $user = User::where('email',$request->input('email'))->first();
            Mail::to($user)->send(new ResetUserPassword($code));

            return response()->json([
                'status'=>true,
                'message'=> ApiMsg::getMsg($request,'send_code'),
            ],Response::HTTP_OK);

        }else{
            return response()->json([
                'status'=>false,
                'title'=> ApiMsg::getMsg($request,'error'),
                'message'=> $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
        
    }


    public function checkCode(Request $request){
        $validator = Validator($request->all(),[
            'code' => 'required|string|exists:forgot_password_codes,code',
        ]);

        if(!$validator->fails()){

            $pssCode = ForgotPasswordCode::where('code',$request->code)->first();

            if($pssCode->created_at > now()->addHour()){
                $pssCode->delete();
                return response()->json([
                    'status'=>false,
                    'title'=> ApiMsg::getMsg($request,'error'),
                    'message'=> ApiMsg::getMsg($request,'expire_code')
                ],Response::HTTP_BAD_REQUEST);
            }

            return response()->json([
                'status'=>true,
                'title'=> ApiMsg::getMsg($request,'success'),
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=>false,
                'title'=> ApiMsg::getMsg($request,'error'),
                'message'=> $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }



    public function resetPassword(Request $request){
        //password_confirmation
        $validator = Validator($request->all(),[
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:12|confirmed',
        ]);

        if(!$validator->fails()){
            $user = User::where('email',$request->input('email'))->first();
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return response()->json([
                'status'=>true,
                'title'=> ApiMsg::getMsg($request,'success'),
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=>false,
                'title'=> ApiMsg::getMsg($request,'error'),
                'message'=> $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }
}
