function abrir_fullscreen() {
    let fullframe = document.getElementById('fullscreen')
    const fselements = document.getElementsByClassName('fs-switch')
    fselements[0].style.display = 'block'
    fselements[1].style.display = 'block'
    fselements[2].style.display = 'flex'
    // fullframe.style.display = 'flex'
}

addEventListener('keydown', function(e) {
    if(e.key === 'Escape') {
        fechar_fullscreen()
    }
})

function fechar_fullscreen() {
    let fullframe = document.getElementById('fullscreen')
    
    fullframe.style.display = 'none'

}