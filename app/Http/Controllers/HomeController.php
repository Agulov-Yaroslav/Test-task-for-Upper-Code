<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $forms = Form::with('user')->get();

        if(Auth::user()->role == 'user') {


            return view('user', ['forms'=>$forms]);
        }
        elseif (Auth::user()->role == 'admin'){
            return view('admin', [
                "forms" =>$forms,
                ]);
        }
        else return abort(404);
    }

}
