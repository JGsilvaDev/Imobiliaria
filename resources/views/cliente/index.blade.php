@extends('layouts.font_import')

@section('title','Cadastrar Cliente')

@section('content')

    @if(Session::has('warning'))
        <div class="alert alert-warning">
            {{ Session::get('warning') }}
        </div>
    @endif

    <form action="clientes" method="post">
        @csrf

        <input type="text" name="nome" id="nome" placeholder="Insira o nome">
        <input type="text" name="email" id="email" placeholder="Insira o email">
        <input type="text" name="telefone" id="telefone" placeholder="Insira o telefone">
        <select name="tp_cliente" id="">
            <option value="proprietario">Proprietario</option>
            <option value="cliente">Cliente</option>
        </select>
        <input type="number" name="idImovel" id="idImovel" placeholder="Insira o id do Imovel">

        <button type="submit">Cadastrar</button>
    </form>

@endsection
