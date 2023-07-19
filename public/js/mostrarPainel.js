const painelPesquisa = document.querySelector('#painel-pesquisa-lateral');
const paginaProdutos = document.querySelector('#lista-produtos');
const botaoPesquisa = document.querySelector('#mobile-buscar')


async function abrirPainel() {
    painelPesquisa.className = 'search-show';
    botaoPesquisa.style.display = 'none';
    paginaProdutos.classList.add('dark');
    window.scrollTo(0, 0)
    // document.body.style.overflow = 'hidden';

    // Adicionar o event listener
    await setTimeout(function() { document.addEventListener("click", handleOutsideClick); }, 500);
}

function fecharPainel() {
    painelPesquisa.className = 'search-hidden';
    botaoPesquisa.style.display = 'block';
    paginaProdutos.classList.remove('dark');
    // document.body.style.overflow = 'auto';
    // Remover o event listener
    document.removeEventListener("click", handleOutsideClick);
}


function handleOutsideClick(event) {
    if (!painelPesquisa.contains(event.target) && painelPesquisa.className == 'search-show') {
        fecharPainel();
    }
  }
