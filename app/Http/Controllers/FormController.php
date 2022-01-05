<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class FormController extends Controller
{
    //Да этот код можно было бы сократить, но видимо делал это неправильно, так как у меня выдавало странные ошибки
    public function store(Request $request){

        $validator = Validator::make($request->only('title', 'body', 'file'), [
            'title' => ['required', 'string', 'min:5', 'max:50'],
            'body' => ['required', 'string', 'max:255'],
            'file'  => ['image',' mimes:jpeg,jpg,png'],
        ])->validate();


        $data = $request->only('title', 'body', 'file', 'user_id');
        if($request->file('file')){
            $file = $request->file('file')->store('uploads', 'public');
                $form = Form::create([
                "title" => $data["title"],
                "body" => $data["body"],
                "file" => asset('/storage/'.$file),
                "user_id" => Auth::user()->id,
            ]);
        }
        else{
            $form = Form::create([
                "title" => $data["title"],
                "body" => $data["body"],
                "user_id" => Auth::user()->id,
            ]);
        }
        $last_id = $form->id;

        if($form){
            return redirect()->route('send', [$last_id]);
        }


    }
}
