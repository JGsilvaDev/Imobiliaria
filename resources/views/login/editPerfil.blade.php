@extends('layouts.layout_home_edit')

@section('title','Editar perfil')

@section('content')

<div id="user-dados">
    <form id="user-container" action="/admin/editUsuario" method="POST">
        @csrf
        <div id="user-picture">
            <h1>{{ $perfil }}</h1>
        </div>

        <div class="user-input-container">
            <input type="text" name="nome" id="user-name" class="user-input" value="{{ $usuario->name }}" placeholder="Nome de usuário">
            <img src="{{ asset('img/edit-icon.svg') }}" class="svg-icon" alt="" draggable="false">
        </div>
        
        <div class="user-input-container">
            <input type="text" name="telefone" id="user-fone" class="user-input" value="{{ $usuario->telefone }}" placeholder="Telefone">
            <img src="{{ asset('img/edit-icon.svg') }}" class="svg-icon" alt="" draggable="false"   >
        </div>
        <div class="user-input-container">
            <input type="email" name="email" id="user-mail" class="user-input" value="{{ $usuario->email }}" placeholder="Email">
            <img src="{{ asset('img/edit-icon.svg') }}" class="svg-icon" alt="" draggable="false">
        </div>

        <button type="submit" id="btn-salvar" class="user-btn">Salvar</button>
    </form>
</div>

<form id="user-options" action="/logout" method="POST">
    @csrf
    <button class="nav-btn" id="sair" type="submit">Sair</button>
</form>

@endsection
