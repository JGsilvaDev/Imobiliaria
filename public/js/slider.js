document.addEventListener('DOMContentLoaded', function() {

    const sliders = [document.getElementById('sliderBanheiro'), document.getElementById('sliderQuartos'), document.getElementById('sliderVagas'), document.getElementById('sliderVagasNaoCoberto'), document.getElementById('sliderSacadas'), document.getElementById('sliderSuite'), document.getElementById('sliderBanheirosAp'), document.getElementById('sliderQuartosAp'), document.getElementById('sliderVagasAp'), document.getElementById('sliderVagasNaoCobertoAp'), document.getElementById('sliderSuiteAp')]

    const slidersValue = [document.getElementById('sliderValueBanheiro'), document.getElementById('sliderValueQuartos'), document.getElementById('sliderValueVagas'), document.getElementById('sliderValueVagasNaoCoberto'), document.getElementById('sliderValueSacadas'), document.getElementById('sliderValueSuite'), document.getElementById('sliderValueBanheirosAp'), document.getElementById('sliderValueQuartosAp'), document.getElementById('sliderValueVagasAp'), document.getElementById('sliderValueVagasNaoCobertoAp'), document.getElementById('sliderValueSuiteAp')]


    sliders.forEach(function(elem, index) {
        elem.addEventListener('input', function() {
            slidersValue[index].textContent = elem.value
        })
    })
});
