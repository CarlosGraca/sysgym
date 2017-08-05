<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Mail;

class SendMailController extends Controller
{
    //
    public function sendMail(
        $introLines  = ['You are receiving this email because we received a password reset request for your account.'],
        $outroLines  = ['If you did not request a password reset, no further action is required.'],
        $level       = 'success',
        $actionText  = 'View',
        $actionUrl   = null,
        $name        = 'ODONTSOFT',
        $subject    = 'TEST MAIL',
        $email       = 'ailtonsemedo.2006@gmail.com',
        $license_key = null,
        $system = null,
        $reset_password = null){

        $company = Company::all()->first();

        Mail::send('layouts.shared.email',compact('level','introLines','outroLines','actionText','actionUrl','name','company','license_key','system','reset_password','email'), function($message) use ($subject,$email,$name)
        {
            $message->to($email,$name)->subject($subject);
        });

        if(count(Mail::failures()) > 0){
            return false;
//            $message = ['message'=>'Failed to send email, please try again.','type'=>'error'];
        }
//        else{
//            $message = ['message'=>'Message send with success.','type'=>'success'];
//        }
        return true;
    }
}
