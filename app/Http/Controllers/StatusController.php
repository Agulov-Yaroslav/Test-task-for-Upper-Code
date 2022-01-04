<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class StatusController extends Controller
{
    public function status(Request $request){
        $form = Form::find($request->id);
        if($form->status == 1){
            $form->status = 0;
        }
        else if($form->status == 0){
            $form->status = 1;
        }

        $form->update();

        return redirect()->back();
    }
}
