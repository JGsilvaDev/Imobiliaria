document.addEventListener('DOMContentLoaded', function() {
    // Seleciona o elemento da flash message e define o tempo de exibição (em milissegundos)
    var flashMessage = document.getElementById('flash-message');
    var displayTime = 3000; // 5 segundos

    console.log(flashMessage);

    // Verifica se a flash message existe e a remove após o tempo de exibição
    if (flashMessage) {
        setTimeout(function() {
            flashMessage.remove();
        }, displayTime);
    }
});

function excluir(){

    let botaoDelete = document.getElementById('remover');

    Swal.fire({
        title: 'Deseja excluir esse imovel?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        confirmButtonColor: '#008000',
        cancelButtonText: 'Não',
        cancelButtonColor: '#FF0000',
        customClass: 'tamanhoModal'
      }).then((result) => {
        if (result.isConfirmed) {
          botaoDelete.click();
        }
    })
}

