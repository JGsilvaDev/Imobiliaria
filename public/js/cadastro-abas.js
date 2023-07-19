const abas = [
    document.getElementById("adicionar-casa-container"),
    document.getElementById("adicionar-apartamento-container"),
    document.getElementById("adicionar-terreno-container")
]

const abas_buttons = [
    document.getElementById("btn-aba-casa"),
    document.getElementById("btn-aba-apartamento"),
    document.getElementById("btn-aba-terreno")
]

//por padrão, a casa vem ativada
abas[1].style = "display:none";
abas[2].style = "display:none";
abas_buttons[0].classList.add("aba-option-selected");

function openCasa() {
    resetDisplay();
    resetClass();

    abas[0].style = "display:flex";

    abas_buttons[0].classList.add("aba-option-selected");
}

function openApartamento() {
    resetDisplay();
    resetClass();

    abas[1].style = "display:flex";

    abas_buttons[1].classList.add("aba-option-selected");
}

function openTerreno() {
    resetDisplay();
    resetClass();

    abas[2].style = "display:flex";

    abas_buttons[2].classList.add("aba-option-selected");
}

function resetDisplay() {
    abas[0].style = "display:none";
    abas[1].style = "display:none";
    abas[2].style = "display:none";
}

function resetClass() {
    abas_buttons[0].classList.remove("aba-option-selected")
    abas_buttons[1].classList.remove("aba-option-selected")
    abas_buttons[2].classList.remove("aba-option-selected")
}
