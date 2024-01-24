let imagem_selecionada = 0;
const screen = window.innerWidth;
let active = false;

function swiperSlider() {
  const galeria = document.querySelectorAll('.slider-carrossel a');
  const principal = document.querySelector('.principal-img img');

  let initalStyle = window.getComputedStyle(galeria[0]);
  let initialUrl = initalStyle.backgroundImage.slice(5, -2);

  principal.setAttribute('src', initialUrl);

  galeria.forEach((item, index) => {
    item.addEventListener('click', (event) => {
      event.preventDefault();

      if (screen > 600) {
        let styled = window.getComputedStyle(item);
        let filterUrl = styled.backgroundImage.slice(5, -2);
        imagem_selecionada = index;

        principal.setAttribute('src', filterUrl);
      } else {
        imagem_selecionada = index;
        const principalMobile = document.querySelectorAll('.principal-img img');
        principalMobile[imagem_selecionada].scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    })
  })
}

function swiperArrows() {
  const principal = document.querySelector('.principal-img img');
  const galeria = document.querySelectorAll('.slider-carrossel a');
  const setaEsquerda = document.querySelector('.seta-esquerda');
  const setaDireita = document.querySelector('.seta-direita');

  setaEsquerda.addEventListener('click', () => {
    imagem_selecionada--;
    let imagem_total = galeria.length - 1;

    if (imagem_selecionada == -1) {
      imagem_selecionada = imagem_total;
    }

    galeria.forEach((item, index) => {
      if (imagem_selecionada == index) {
        let styled = window.getComputedStyle(item);
        let filterUrl = styled.backgroundImage.slice(5, -2);

        principal.setAttribute('src', filterUrl);
      }
    });
  });

  setaDireita.addEventListener('click', () => {
    imagem_selecionada++;
    let imagem_total = galeria.length - 1;

    if (imagem_selecionada > imagem_total) {
      imagem_selecionada = 0;
    }

    galeria.forEach((item, index) => {
      if (imagem_selecionada == index) {
        let styled = window.getComputedStyle(item);
        let filterUrl = styled.backgroundImage.slice(5, -2);

        principal.setAttribute('src', filterUrl);
      }
    });
  });
}

function swiperMobile() {
  const galeria = document.querySelectorAll('.slider-carrossel a');
  const principal = document.querySelector('.principal-img .slider');

  if (screen < 600) {
    galeria.forEach((item, index) => {
      if (index != 0) {
        let selected = document.createElement('img');
        let styled = window.getComputedStyle(item);
        let filterUrl = styled.backgroundImage.slice(5, -2);

        selected.setAttribute('src', filterUrl);
        principal.appendChild(selected);
      }
    });
  }
}

swiperMobile();
swiperSlider();
swiperArrows();

function fullscreen() {
  const container = document.querySelector('#carrossel-container');
  const principal = document.querySelectorAll('.principal-img img');
  const body = document.querySelector('body');
  const icon = document.querySelector('.expand');

  let url = window.location.href;
  let completeUrl = url.split("/imoveis/");
  let baseUrl = completeUrl[0];

  icon.addEventListener('click', () => {
    active = !active;
    activate();
  });

  principal.forEach(($item, $index) => {
    $item.addEventListener('click', () => {
      imagem_selecionada = $index;
      active = !active;
      activate();
      principal[imagem_selecionada].scrollIntoView({ behavior: 'smooth', block: 'center' });
    })
  })

  const activate = () => {
    if (active) {
      body.style.overflow = 'hidden'
      icon.setAttribute('src', `${baseUrl}/img/fechar-icone.svg`);
    } else {
      body.style.overflow = 'auto'
      icon.setAttribute('src', `${baseUrl}/img/expand.svg`);
    }
    container.classList.toggle('fullscreen-active');
  }
}

fullscreen();