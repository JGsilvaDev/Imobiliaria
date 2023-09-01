
let imagemCasaPrincipal = document.getElementById('imagemCasaPrincipal')
const btnCasa = document.getElementById('btn-casa-enviar')

btnCasa.addEventListener('click',function(e){

    if(imagemCasaPrincipal.files.length == 0){
        e.preventDefault()

        Swal.fire({
            icon: 'warning',
            title: 'Escolha uma imagem principal',
            showConfirmButton: false,
            timer: 1500
        })
    }
});





