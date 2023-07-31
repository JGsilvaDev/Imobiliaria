@extends('layouts.font_import')

@section('title','contatos')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/request.css') }}">
    <div id="corpo">
        <div id="popup-informacoes" style="display:none">
            <button id="btn-popup-fechar" onclick="fecharInfo()">Fechar</button>
            <h1>Informações</h1>
            <div class="cliente-dados">
                <div class="cliente-dados-container">
                    <p class="dados-title">Nome</p>
                    <p class="dados-info" id="dados-nome">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Telefone</p>
                    <p class="dados-info" id="dados-telefone">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Email</p>
                    <p class="dados-info" id="dados-email">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Motivo do contato</p>
                    <p class="dados-info" id="dados-motivo">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Mensagem</p>
                    <p class="dados-info" id="dados-mensagem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error atque, sint non numquam soluta quaerat, molestias totam porro tenetur expedita exercitationem optio. Molestiae accusantium nesciunt quo. Sint tempora doloribus maxime repellendus aliquam eaque. Vero aut commodi dicta, totam consectetur repudiandae quam at eligendi reprehenderit deserunt, pariatur minus dolorum recusandae praesentium?</p>
                </div>

            </div>
            <div class="cliente-botoes">
                <button title="Apaga o contato da lista, use caso já tenha resolvido" class="cliente-btn" id="cliente-apagar">Apagar</button>
                <button title="Marca o contato como solucionado, mas não o apaga da lista" class="cliente-btn" id="cliente-solucionar" onclick="Swal.fire('Solucionado','O contato agora está marcado como solucionado. Ele não sai da tabela','success'); fecharInfo()">Solucionar</button>
            </div>
        </div>

        <table cellspacing="0" id="request-table">
    
            <thead class="table-header" cellspacing="0">
                <th class="table-title"></th>
                <th class="table-title">Nome</th>
                <th class="table-title">Telefone</th>
                <th class="table-title">Email</th>
                <th class="table-title">Motivo do contato</th>
            </thead>

            <!-- <tbody class="table-body">
                <td class="body-info" ><button class="button-info" id="information-5"  onclick="mostrarInfo(event)">Ver</button></td>
                <td class="body-info divider-left information-5">goku</td>
                <td class="body-info divider-left information-5">(12) 9999-9999</td>
                <td class="body-info divider-left information-5">oieusouogoku@email.com</td>
                <td class="body-info divider-left information-5">anúncio</td>
                <input class=" information-5" type="hidden" name="" value="motivo da mensagem">
            </tbody> -->

            @foreach ($contatos as $cont)
                <p></p>
                <p></p>
                <p></p>

                <tbody class="table-body">
                <td class="body-info" ><button class="button-info" id="information-{{$cont->id}}"  onclick="mostrarInfo(event)">Ver</button></td>
                <td class="body-info divider-left information-{{$cont->id}}">{{$cont->nome}}</td>
                <td class="body-info divider-left information-{{$cont->id}}">{{ $cont->telefone }}</td>
                <td class="body-info divider-left information-{{$cont->id}}">{{ $cont->email }}</td>
                <td class="body-info divider-left information-{{$cont->id}}">{{ $cont->motivoContato }}</td>
                <input class=" information-{{$cont->id}}" type="hidden" name="" value="{{ $cont->mensagem}}">
                </tbody>
            @endforeach


            


            <!--
                USANDO O INFORMATION ID NA HORA DE INTEGRAR
                A CLASSE INFORMATION ID É IMPORTANTE PARA PUXAR AS INFORMAÇÕES PRO JS
                O JAVASCRIPT CRIA UM ARRAY BASEADO NESSA CLASSE, PORTANTO, O NOME DA CLASSE DEVE SER "information-ID_DO_CLIENTE"

                FAVOR COMUNICAR O DIGAS CASO HAJA QUALQUER DÚVIDA

                APAGAR ESSA MENSAGEM APÓS SE CERTIFICAR DE QUE TUDO ESTÁ RODANDO CORRETAMENTE
            -->

        </table>

    </div>

<script>
    //carrega as informações e então abre o painel
    function mostrarInfo(event) {
        loadInfo(event);
        const popup = document.getElementById('popup-informacoes')

        popup.style.display = 'flex'
    }

    //fecha o painel
    function fecharInfo() {
        const popup = document.getElementById('popup-informacoes')
        popup.style.display = 'none'
    }

    //carrega as informações
    function loadInfo(event) {
        const client_id = event.target.id
        //arrays
        const dados_array = [
            document.getElementById('dados-nome'),
            document.getElementById('dados-telefone'),
            document.getElementById('dados-email'),
            document.getElementById('dados-motivo'),
            document.getElementById('dados-mensagem')
        ]
        const info_array = document.getElementsByClassName(client_id)

        for(let i=0; i<dados_array.length-1; i++) {
            dados_array[i].innerHTML = info_array[i].innerHTML
        }
        dados_array[4].innerHTML = info_array[4].value
    }

</script>


@endsection