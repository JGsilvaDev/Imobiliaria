function formatarNumero(numero) {
    return numero.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }



function formatarInput() {
    const formataveis = document.getElementsByClassName("input-format") 
    for(item of formataveis) {
        item.value = item.value.replace(/,/g, '');
    }

    return true
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

  
