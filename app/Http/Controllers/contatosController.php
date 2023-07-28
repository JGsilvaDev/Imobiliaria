<?php

namespace App\Http\Controllers;

use App\Models\Contatos;
use Illuminate\Http\Request;

class contatosController extends Controller
{
    public function index(){

        $contatos = Contatos::all();

        return view('admin/contatos',['contatos' => $contatos]);
    }
}
