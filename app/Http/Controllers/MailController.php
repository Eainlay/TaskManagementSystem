<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class MailController extends Controller
{
   public function sendEmail(){
    $to="moeeainsan111@gmail.com";
    $message="Welcome from my mail testing Successful Message";
    $subject="Testing Gmail";
    Mail::to($to)->send(new WelcomeMail($message,$subject));
    return "Send Email";
   }
}
