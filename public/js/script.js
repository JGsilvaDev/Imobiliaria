$(document).ready(function() {
    // Seleciona o elemento da flash message e define o tempo de exibição (em milissegundos)
    var flashMessage = $('.flash-message');
    var displayTime = 3000; // 5 segundos

    // Verifica se a flash message existe e a remove após o tempo de exibição
    if (flashMessage.length) {
        setTimeout(function() {
            flashMessage.remove();
        }, displayTime);
    }
});
