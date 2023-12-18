function formatarNumero(numero) {
    return numero.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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
  
