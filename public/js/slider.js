document.addEventListener('DOMContentLoaded', function() {

    const sliders = [document.getElementById('sliderBanheiroCasa'), document.getElementById('sliderQuartosCasa'), document.getElementById('sliderVagasCasa'), document.getElementById('sliderVagasNaoCobertoCasa'), document.getElementById('sliderSacadasCasa'), document.getElementById('sliderSuiteCasa'), document.getElementById('sliderBanheirosAp'), document.getElementById('sliderQuartosAp'), document.getElementById('sliderVagasAp'), document.getElementById('sliderVagasNaoCobertoAp'), document.getElementById('sliderSuiteAp')]

    const slidersValue = [document.getElementById('sliderValueBanheiroCasa'), document.getElementById('sliderValueQuartosCasa'), document.getElementById('sliderValueVagasCasa'), document.getElementById('sliderValueVagasNaoCobertoCasa'), document.getElementById('sliderValueSacadasCasa'), document.getElementById('sliderValueSuiteCasa'), document.getElementById('sliderValueBanheirosAp'), document.getElementById('sliderValueQuartosAp'), document.getElementById('sliderValueVagasAp'), document.getElementById('sliderValueVagasNaoCobertoAp'), document.getElementById('sliderValueSuiteAp')]

    sliders.forEach(function(elem, index) {
        elem.addEventListener('input', function() {
            slidersValue[index].textContent = elem.value
        })
    })
});
