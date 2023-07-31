function excluir(id){
    Swal.fire({
        title: 'Deseja excluir esse imovel?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        confirmButtonColor: '#008000',
        cancelButtonText: 'Não',
        cancelButtonColor: '#FF0000'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/deletar/img/' + id.parentElement.children[1].value,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  id.parentElement.style.display = 'none';

                  Swal.fire({
                    icon: 'success',
                    title: 'Imagem excluida com sucesso',
                    showConfirmButton: false,
                    timer: 1800
                  })

                  console.log(response);
                },
                error: function(xhr, status, error) {
                  console.error(error);
                }
            });
        }
    })
}

function excluirImg(id){
    Swal.fire({
        title: 'Deseja excluir essa imagem?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        confirmButtonColor: '#008000',
        cancelButtonText: 'Não',
        cancelButtonColor: '#FF0000'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/deletar/img/' + id.parentElement.parentElement.children[1].value,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  id.parentElement.parentElement.style.display = 'none';

                  Swal.fire({
                    icon: 'success',
                    title: 'Imagem excluida com sucesso',
                    showConfirmButton: false,
                    timer: 1800
                  })

                  console.log(response);
                },
                error: function(xhr, status, error) {
                  console.error(error);
                }
            });
        }
    })
}
