document.addEventListener('DOMContentLoaded', function() {
    const sliderBanheiroCasa = document.getElementById('sliderBanheiroCasa');
    const outputBanheiroCasa = document.getElementById('sliderValueBanheiroCasa');

    const sliderQuartoCasa = document.getElementById('sliderQuartosCasa');
    const outputQuartoCasa = document.getElementById('sliderValueQuartosCasa');

    const sliderVagaCasa = document.getElementById('sliderVagasCasa');
    const outputVagaCasa = document.getElementById('sliderValueVagasCasa');

    const sliderSuiteCasa = document.getElementById('sliderSuiteCasa');
    const outputSuiteCasa = document.getElementById('sliderValueSuiteCasa');


    sliderBanheiroCasa.addEventListener('input', function() {
        outputBanheiroCasa.textContent = sliderBanheiroCasa.value;
    });

    sliderQuartoCasa.addEventListener('input', function() {
        outputQuartoCasa.textContent = sliderQuartoCasa.value;
    });

    sliderVagaCasa.addEventListener('input', function() {
        outputVagaCasa.textContent = sliderVagaCasa.value;
    });

    sliderSuiteCasa.addEventListener('input', function() {
        outputSuiteCasa.textContent = sliderSuiteCasa.value;
    });

    const sliderBanheiroAp = document.getElementById('sliderBanheirosAp');
    const outputBanheiroAp = document.getElementById('sliderValueBanheirosAp');

    const sliderQuartoAp = document.getElementById('sliderQuartosAp');
    const outputQuartoAp = document.getElementById('sliderValueQuartosAp');

    const sliderVagaAp = document.getElementById('sliderVagasAp');
    const outputVagaAp = document.getElementById('sliderValueVagasAp');

    const sliderSuiteAp = document.getElementById('sliderSuiteAp');
    const outputSuiteAp = document.getElementById('sliderValueSuiteAp');

    sliderBanheiroAp.addEventListener('input', function() {
        outputBanheiroAp.textContent = sliderBanheiroAp.value;
    });

    sliderQuartoAp.addEventListener('input', function() {
        outputQuartoAp.textContent = sliderQuartoAp.value;
    });

    sliderVagaAp.addEventListener('input', function() {
        outputVagaAp.textContent = sliderVagaAp.value;
    });

    sliderSuiteAp.addEventListener('input', function() {
        outputSuiteAp.textContent = sliderSuiteAp.value;
    });
});
