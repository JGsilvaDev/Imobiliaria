document.addEventListener('DOMContentLoaded', function() {

    const imagens = document.querySelectorAll('[id^="imagem-"]');
    let indiceAtual = 0;

    function exibirImagem(indice) {
        imagens.forEach((imagem, index) => {
            imagem.style.display = (index === indice) ? 'block' : 'none';
        });
    }

    document.getElementById('mudar-imagem').addEventListener('click', () => {
        indiceAtual = (indiceAtual + 1) % imagens.length; // Avança para o próximo índice circularmente
        exibirImagem(indiceAtual);
    });

    exibirImagem(indiceAtual);

});
