document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('imagemCasa').addEventListener('change', function (event) {
        var input = event.target;
        var reader;
        var imagePreview = document.getElementById('imagePreviewCasa');

        for (var i = 0; i < input.files.length; i++) {
            reader = new FileReader();

            reader.onload = function (e) {
                var dataURL = e.target.result;
                var divElement = document.createElement('div');
                divElement.style.backgroundImage = 'url(' + dataURL + ')';
                divElement.classList.add('img');

                imagePreview.appendChild(divElement);
            };

            reader.readAsDataURL(input.files[i]);
        }
    });

    document.getElementById('imagemAp').addEventListener('change', function (event) {
        var input = event.target;
        var reader;
        var imagePreview = document.getElementById('imagePreviewAp');

        for (var i = 0; i < input.files.length; i++) {
            reader = new FileReader();

            reader.onload = function (e) {
                var dataURL = e.target.result;
                var divElement = document.createElement('div');
                divElement.style.backgroundImage = 'url(' + dataURL + ')';
                divElement.classList.add('img');

                imagePreview.appendChild(divElement);
            };

            reader.readAsDataURL(input.files[i]);
        }
    });

    document.getElementById('imagemTerreno').addEventListener('change', function (event) {
        var input = event.target;
        var reader;
        var imagePreview = document.getElementById('imagePreviewTerreno');

        for (var i = 0; i < input.files.length; i++) {
            reader = new FileReader();

            reader.onload = function (e) {
                var dataURL = e.target.result;
                var divElement = document.createElement('div');
                divElement.style.backgroundImage = 'url(' + dataURL + ')';
                divElement.classList.add('img');

                imagePreview.appendChild(divElement);
            };

            reader.readAsDataURL(input.files[i]);
        }
    });
});
