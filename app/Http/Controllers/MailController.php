<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Mail;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function send($last_id){

        //$form = Form::with('user')->where('id', '=', '10')->get();
        $forms =  Form::with('user')->where('id', $last_id)->get();


        //$form = Form::with('forms')->where('id' == 20)->get();
        Mail::send(['text'=>'email'], ['forms'=>$forms], function($message){
            $message->to('admin@gmail.com')->subject('Заявка клиента'); //$message->to('кому придет письмо')->subject('Тема письма');
            $message->from('admin@gmail.com');                          //$message->from('от кого письмо');
        });
        //Почты отправителя и получателя можете указать свои, чтобы проверить, все ли работает, не забудьте настроить файл .env
        return view('success');
    }
}
