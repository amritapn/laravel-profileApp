<?php

namespace App\Http\Controllers;
use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller {

    public function send(Request $request){
        $message = $request->message;
        Mail:send('emails.sendMail', ['name'=>'amrita'], function($message){
            $message->to('amritapnay@gmail.com','some one')->subject('welcome');
        });
    }
}