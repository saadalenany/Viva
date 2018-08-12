<?php
/**
 * Created by PhpStorm.
 * User: Library
 * Date: 29/12/15
 * Time: 2:28 PM
 */

namespace App\Libraries;

use Illuminate\Support\Facades\Mail;

class SharedFunctions {

    public static function isSuperAdmin($user){
        if($user->email == config('app.superAdmin')){
            return true;
        }

        return false;
    }

    public static function sendEmailTo($view, $to, $title, $contentData){
        $data = array(
            'title'=>$title,
            'to'=>$to,
            'data' => $contentData,
        );

        Mail::send($view, $data, function ($message) use ($data) {
            $message->from('no-reply@immigration.com', $data['title']);
            $message->to($data['to'])->subject($data['title']);
        });
    }

    public static function sendEmailToQueue($view, $to, $title, $contentData){
        $data = array(
            'title'=>$title,
            'to'=>$to,
            'data' => $contentData,
        );

        Mail::queue($view, $data, function ($message) use ($data) {
            $message->from('no-reply@immigration.com', $data['title']);
            $message->to($data['to'])->subject($data['title']);
        });
    }

    public static function sendEmail($name, $title, $content){
        $data = array(
            'title' => $title,
            'content' => $content,
            'name'=>$name
        );

        Mail::send('emails.welcome', $data, function ($message) use ($data) {
            $message->from('test@mazad.com', $data['title']);
            $message->to('mahmoud.h26@gmail.com')->subject($data['title']);
        });
    }

    public static function sendEmailQueue($name, $title, $content){
        $data = array(
            'name' => $name,
            'title'=>$title,
            'content'=>$content
        );

        Mail::queue('emails.welcome', $data, function($message) use ($data)
        {
            $message->from('test@mazad.com', $data['title']);

            $message->to('mahmoud.h26@hotmail.com', 'John Smith')->subject($data['title']);
        });
    }

    public static function sendSMS($phone, $msg){
        ///201098609573
        $url = "http://canadiansms.com/api/sendsms.php?".
            "username=Appdateme&password=simsim11&route=primary&mobiles=".$phone
            ."&message=".urlencode($msg);
        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_exec ($curl);
        curl_close ($curl);
    }


    //////
    public static function isWriter(){

    }

    public static function isPublisher(){

    }

    public static function isSiteManager(){

    }

    public static function canAccessSection(){

    }
}
