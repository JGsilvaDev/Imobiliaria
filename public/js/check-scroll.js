
// Função para verificar se é possível rolar
function isScrollable() {
    // Obtém o elemento principal que você deseja verificar a rolagem (por exemplo, o body)
    const element = document.body;
  
    // Verifica se a altura total do conteúdo é maior que a altura visível na janela
    const isScrollable = element.scrollHeight > element.clientHeight;
  
    return isScrollable;
  }

if(isScrollable() === false) {
    var footer = document.getElementById('admin-footer');

    footer.style.position = 'absolute';
    footer.style.bottom = '0';
    footer.style.left = '0';
}