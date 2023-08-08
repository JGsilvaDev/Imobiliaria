function img_fullscreen(url) {
    let fullframe = document.getElementById('fullscreen')
    let img_fullscreen = document.getElementById('img-fullscreen')

    fullframe.style.display = 'flex'
    img_fullscreen.src = url
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