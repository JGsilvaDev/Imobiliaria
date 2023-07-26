const painelPesquisa = document.querySelector('#painel-pesquisa-lateral');
const paginaProdutos = document.querySelector('#lista-produtos');
const botaoPesquisa = document.querySelector('#mobile-buscar');
const escureciveis = document.getElementsByClassName('enable-dark');


async function abrirPainel() {
    painelPesquisa.className = 'search-show';
    botaoPesquisa.style.display = 'none';
    // paginaProdutos.classList.add('dark');

    // for(let i=0; i<escureciveis.length; i++) { escureciveis[i].classList.add('dark') }

    window.scrollTo(0, 0)
    document.body.style.overflow = 'hidden';

    // Adicionar o event listener
    await setTimeout(function() { document.addEventListener("click", handleOutsideClick); }, 500);
}

function fecharPainel() {
    painelPesquisa.className = 'search-hidden';
    botaoPesquisa.style.display = 'block';
    // for(let i=0; i<escureciveis.length; i++) { escureciveis[i].classList.remove('dark') }
    document.body.style.overflow = 'auto';
    // Remover o event listener
    document.removeEventListener("click", handleOutsideClick);
}


function handleOutsideClick(event) {
    if (!painelPesquisa.contains(event.target) && painelPesquisa.className == 'search-show') {
        fecharPainel();
    }
  }
