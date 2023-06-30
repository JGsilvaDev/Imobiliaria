document.addEventListener('DOMContentLoaded', function() {

    let botaoLogout = document.getElementById('sair');

    $('#dropdown').change(function() {
        var option = $('#dropdown').find(":selected").text();

        if(option == 'Editar Perfil'){
            window.location.href = '/admin/editUsuario';
        };

        if(option == 'Sair'){
            botaoLogout.click();
        }

    });

});

