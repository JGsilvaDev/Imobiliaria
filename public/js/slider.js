document.addEventListener('DOMContentLoaded', function() {

    const sliders = [
        document.getElementById('sliderBanheiro'),
        document.getElementById('sliderSuite'),
        document.getElementById('sliderQuartos'),
        document.getElementById('sliderVagas'),
        document.getElementById('sliderVagasNaoCoberto'),
        document.getElementById('sliderSalas'),
        document.getElementById('sliderDorms')
    ]

    const slidersValue = [
        document.getElementById('sliderValueBanheiro'),
        document.getElementById('sliderValueSuite'),
        document.getElementById('sliderValueQuartos'),
        document.getElementById('sliderValueVagas'),
        document.getElementById('sliderValueVagasNaoCoberto'),
        document.getElementById('sliderValueSalas'),
        document.getElementById('sliderValueDorms')
    ]


    sliders.forEach(function(elem, index) {
        elem.addEventListener('input', function() {
            slidersValue[index].textContent = elem.value
        })
    })
});
