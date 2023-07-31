let select = document.querySelector('#dropdown')

select.addEventListener('change', function () {
    let selecionada = this.options[this.selectedIndex]
    let url = selecionada.getAttribute('data-url')

    if (url === '/logout') {
        document.getElementById('sair').click()
    }
    else {
        window.location.href = url
    }
})
