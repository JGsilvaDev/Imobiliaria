document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('imagemEdit').addEventListener('change', function (event) {
        var input = event.target;
        var reader;
        var imagePreview = document.getElementById('imagemPreviewEdit');
        var inputFilePrincipal = document.getElementById('imagemEditPrincipal');

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
                    var icon = document.createElement('i');
                    icon.classList.add('fas', 'fa-crown', 'fa-2x'); 
                    button.appendChild(icon);
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

function trocarPrincipal(id){

    $.ajax({
        url: '/edit/imgPrincipal/' + id.parentElement.parentElement.children[1].value,
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            window.location.reload(true);
            console.log(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
    });


}
