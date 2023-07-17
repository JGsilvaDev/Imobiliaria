visivel = false;
function changeVisibility() {
    visivel = !visivel
    console.log(visivel)
    if(visivel == false){
        document.getElementById('interesse').style.display = 'none'
        document.getElementById('mostrar').style.display = 'block'
        document.getElementById('produto-layout').style.display = 'block'
    } 
    if(visivel == true) {
        document.getElementById('interesse').style.display = 'flex'
        document.getElementById('mostrar').style.display = 'none'
        document.getElementById('produto-layout').style.display = 'none'
    }
}