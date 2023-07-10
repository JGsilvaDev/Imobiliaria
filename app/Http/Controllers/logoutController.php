<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class logoutController extends Controller
{
    public function index(){
        session()->flush();
        return redirect('login');
    }

    public function filtro(){
        Session::forget('search');
        return redirect('/imoveis');
    }
}
