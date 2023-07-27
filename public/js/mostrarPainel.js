const painelPesquisa = document.querySelector('#painel-pesquisa-lateral');
const botaoPesquisa = document.querySelector('#mobile-buscar');


async function abrirPainel() {
    painelPesquisa.style.display = 'flex';
    botaoPesquisa.style.display = 'none';
}

function fecharPainel() {
    painelPesquisa.style.display = 'none';
    botaoPesquisa.style.display = 'block';
}


