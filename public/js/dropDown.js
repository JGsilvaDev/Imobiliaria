document.addEventListener('DOMContentLoaded', function() {

    let botaoLogout = document.getElementById('sair');

    $('#dropdown').change(function() {
        var option = $('#dropdown').find(":selected").text();
        console.log(option);

        if(option == 'Home'){
            window.location.href = '/admin';
        };

        if(option == 'Editar Perfil' || option == 'Perfil'){
            window.location.href = '/admin/editUsuario';
        };

        if(option == 'Sair'){
            botaoLogout.click();
        }

    });

});

