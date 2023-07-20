document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('imagemCasa').addEventListener('change', function (event) {
        var input = event.target;
        var reader;
        var imagePreview = document.getElementById('imagePreviewCasa');
        var inputFilePrincipal = document.getElementById('imagemCasaPrincipal');

        imagePreview.innerHTML = '';

        var dataTransfer = new DataTransfer();
        var fileMap = {};

        for (var i = 0; i < input.files.length; i++) {
            reader = new FileReader();

            reader.onload = function (index) {
                return function(e) {
                    var dataURL = e.target.result;
                    var divElement = document.createElement('div');
                    divElement.style.backgroundImage = 'url(' + dataURL + ')';
                    divElement.classList.add('img');
                    divElement.id = index + i;

                    var button = document.createElement('button');
                    button.textContent = 'Clique aqui';
                    button.style.margin = 'auto';
                    button.classList.add('opaco');

                    var file = input.files[index];
                    fileMap[divElement.id] = file;

                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        this.classList.remove('opaco');

                        var divId = parseInt(this.parentNode.id);

                        var file = fileMap[divId];

                        var fileWithName  = dataURLToFile(dataURL, file.name);

                        dataTransfer.items.add(fileWithName);

                        inputFilePrincipal.files = dataTransfer.files;

                    });

                    divElement.appendChild(button);

                    imagePreview.appendChild(divElement);
                };
            }(i);

            reader.readAsDataURL(input.files[i]);
        }
    });

    document.getElementById('imagemAp').addEventListener('change', function (event) {
        var input = event.target;
        var reader;
        var imagePreview = document.getElementById('imagePreviewAp');
        var inputFilePrincipal = document.getElementById('imagemApPrincipal');

        imagePreview.innerHTML = '';

        var dataTransfer = new DataTransfer();
        var fileMap = {};

        for (var i = 0; i < input.files.length; i++) {
            reader = new FileReader();

            reader.onload = function (index) {
                return function(e) {
                    var dataURL = e.target.result;
                    var divElement = document.createElement('div');
                    divElement.style.backgroundImage = 'url(' + dataURL + ')';
                    divElement.classList.add('img');
                    divElement.id = index + i;

                    var button = document.createElement('button');
                    button.textContent = 'Clique aqui';
                    button.style.margin = 'auto';
                    button.classList.add('opaco');

                    var file = input.files[index];
                    fileMap[divElement.id] = file;

                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        this.classList.remove('opaco');

                        var divId = parseInt(this.parentNode.id);

                        var file = fileMap[divId];

                        var fileWithName  = dataURLToFile(dataURL, file.name);

                        dataTransfer.items.add(fileWithName);

                        inputFilePrincipal.files = dataTransfer.files;

                    });

                    divElement.appendChild(button);

                    imagePreview.appendChild(divElement);
                };
            }(i);

            reader.readAsDataURL(input.files[i]);
        }
    });

    document.getElementById('imagemTerreno').addEventListener('change', function (event) {
        var input = event.target;
        var reader;
        var imagePreview = document.getElementById('imagePreviewTerreno');
        var inputFilePrincipal = document.getElementById('imagemTerrenoPrincipal');

        imagePreview.innerHTML = '';

        var dataTransfer = new DataTransfer();
        var fileMap = {};

        for (var i = 0; i < input.files.length; i++) {
            reader = new FileReader();

            reader.onload = function (index) {
                return function(e) {
                    var dataURL = e.target.result;
                    var divElement = document.createElement('div');
                    divElement.style.backgroundImage = 'url(' + dataURL + ')';
                    divElement.classList.add('img');
                    divElement.id = index + i;

                    var button = document.createElement('button');
                    button.textContent = 'Clique aqui';
                    button.style.margin = 'auto';
                    button.classList.add('opaco');

                    var file = input.files[index];
                    fileMap[divElement.id] = file;

                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        this.classList.remove('opaco');

                        var divId = parseInt(this.parentNode.id);

                        var file = fileMap[divId];

                        var fileWithName  = dataURLToFile(dataURL, file.name);

                        dataTransfer.items.add(fileWithName);

                        inputFilePrincipal.files = dataTransfer.files;

                    });

                    divElement.appendChild(button);

                    imagePreview.appendChild(divElement);
                };
            }(i);

            reader.readAsDataURL(input.files[i]);
        }
    });


});

function dataURLToFile(dataURL, filename) {
    var arr = dataURL.split(',');
    var mime = arr[0].match(/:(.*?);/)[1];
    var bstr = atob(arr[1]);
    var n = bstr.length;
    var u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }

    return new File([u8arr], filename, { type: mime });
}
