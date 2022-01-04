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

        if(Auth::user()->role == 'user') {
            return view('user');
        }
        elseif (Auth::user()->role == 'admin'){
            return view('admin');
        }
        else return abort(404);
    }

}
