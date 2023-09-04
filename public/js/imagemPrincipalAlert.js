
let imagemCasaPrincipal = document.getElementById('imagemCasaPrincipal')
let imagemApartamentoPrincipal = document.getElementById('imagemApPrincipal')
let imagemTerrenoPrincipal = document.getElementById('imagemTerrenoPrincipal')
const btnCasa = document.getElementById('btn-casa-enviar')
const btnApartamento = document.getElementById('btn-apt-enviar')
const btnTerreno = document.getElementById('btn-trn-enviar')

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
btnApartamento.addEventListener('click',function(e){

    if(imagemApartamentoPrincipal.files.length == 0){
        e.preventDefault()

        Swal.fire({
            icon: 'warning',
            title: 'Escolha uma imagem principal',
            showConfirmButton: false,
            timer: 1500
        })
    }
});
btnTerreno.addEventListener('click',function(e){

    if(imagemTerrenoPrincipal.files.length == 0){
        e.preventDefault()

        Swal.fire({
            icon: 'warning',
            title: 'Escolha uma imagem principal',
            showConfirmButton: false,
            timer: 1500
        })
    }
});





