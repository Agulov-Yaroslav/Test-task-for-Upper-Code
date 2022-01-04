<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;



class FormController extends Controller
{
   /* public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'min:5', 'max:50'],
            'body' => ['required', 'string', 'max:255'],
            'file'  => ['image',' mimes:jpeg,jpg,png'],
        ]);
    }*/
    //Да этот код можно было бы сократить, но видимо делал это неправильно, так как у меня выдавало странные ошибки
    public function store(Request $request){
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


        if($form){
            return view('success');
        }

    }
}
