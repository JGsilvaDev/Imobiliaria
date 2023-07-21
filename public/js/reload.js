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
    let modal = document.getElementById('modalContato');

    if(modal.style.display == 'none'){
        modal.style.display = 'block';
    }else{
        modal.style.display = 'none' ;
    }

}
