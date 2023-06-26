<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    private $mensagem;
    private $nome;

    public function __construct($mensagem, $nome)
    {
        $this->mensagem = $mensagem;
        $this->nome = $nome;

    }

    public function build()
    {
        return $this->view('email.index')
                    ->subject('')
                    ->with('mensagem', $this->mensagem)
                    ->with('nome', $this->nome);
    }
}
