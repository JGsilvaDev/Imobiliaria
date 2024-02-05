function formatarNumero(numero) {
    return numero.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

function trocaPonto() {
    console.log("Função executada")
    const trocaveis = document.getElementsByClassName('troca-ponto')

    for (item of trocaveis) {
        item.innerHTML = item.innerHTML.replace('.',',')
        if (!item.innerHTML.includes(',')) {
            item.innerHTML += ',00'
        }
    }
}

function formatarFront(classname) {
    const formataveis = document.getElementsByClassName(classname) 
    for(item of formataveis) {
        item.innerHTML = formatarNumero(item.innerHTML)
    }
}

window.onload = (event) => {
    formatarFront('num-format')
}

  
