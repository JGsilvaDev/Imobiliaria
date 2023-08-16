window.onpageshow = function(event) {
    if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
        // Recarrega a página
        window.location.reload();
    }
};

function modalFechar(btn){
    let modal = btn.parentElement.parentElement;

    modal.style.display = 'none';

}

function modal(){
    let pagina = document.getElementsByClassName('background-blur');
    let paginaSize = pagina.length
    let modal = document.getElementById('modalContato');

    if(modal.style.display == 'none'){
        modal.style.display = 'block';
        for(let i=0; i<paginaSize; i++) { pagina[i].style.filter = "blur(5px)" }

        document.body.style.overflow = 'hidden'

    }else{
        modal.style.display = 'none' ;
        pagina[0].style.filter = "none"
        for(let i=0; i<paginaSize; i++) { pagina[i].style.filter = "none" }
        document.body.style.overflow = 'visible'
    }
    
}

function clickClose() { //função que fecha modal ao clicar pra fora
    let pagina = document.getElementsByClassName('background-blur');
    let paginaSize = pagina.length
    let modal = document.getElementById('modalContato');
    
    modal.style.display = 'none' ;
    pagina[0].style.filter = "none"
    for(let i=0; i<paginaSize; i++) { pagina[i].style.filter = "none" }
    document.body.style.overflow = 'visible'
}
