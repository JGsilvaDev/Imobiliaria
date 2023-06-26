<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

class emailController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'nome' => 'required'
        ],[
            'email.required' => 'Campo email é obrigatório',
            'nome.required' => 'Campo nome obrigatório'
        ]);

        $destinatario = $request->email;
        $nome = $request->nome;
        $assunto = 'Contato';
        $mensagem = $request->mensagem;

        Mail::to($destinatario)->send(new Email($assunto, $mensagem, $nome));

        session()->flash('email', 'Email enviado');

        return redirect()->back();

    }
}
