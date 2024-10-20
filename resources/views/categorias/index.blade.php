@extends('layouts.app')

@section('assets')
    <style>
        .header-local {
            display: flex;
            justify-content: space-between;
        }

        .pagination-1 {
            justify-content: center;
            display: flex;
        }

        .icone {
            font-size: 15px;
            margin-right: 15px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding-bottom: 30px;

        }

        .form-control+.form-control {
            margin-top: 15px;

        }

        .card-header {
            padding: 50px;
        }

        .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1.75rem);
            justify-content: center;
        }

        .modal-content {

            min-width: 350px;
            margin: auto;
        }

        .alert {
            position: fixed;
            top: 1rem;
            right: 10rem;
            z-index: 1050;
            transition: opacity 0.5s ease-out;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            width: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col  md-4">
                <h1>Categorias</h1>
                <div class="header-local">
                    <h4>Listagem</h4>
                    <p class="d-inline-flex gap-1 pb-5">
                        <a class="btn mt-3 btn-primary" data-bs-toggle="collapse" href="#addcategoria" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Adicionar
                        </a>
                    </p>
                </div>
            </div>

            {{-- @if (session('success'))
                <div id="success-alert" class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif --}}

            <div class="collapse" id="addcategoria">
                <div class="card-body">
                    <form action="{{ route('categorias.store') }}" method="POST" id="form-store-categorias">
                        @csrf
                        <input type="text" class="form-control" name="categoria"
                            placeholder="Digite o nome da categoria">
                        <button type="submit" class="btn btn-success mt-2">Salvar</button>
                    </form>
                </div>
            </div>

            <div id="resposta">

            </div>
        </div>
    </div>

    {{-- <div class="row justify-content-center">
        <div class="col-auto text-center">

            {!! $categorias->links() !!}

        </div>
    </div> --}}


    {{-- Modal de edição --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">


            <form action="{{ route('categorias.update') }}" method="POST"id="form-update-categorias">


                @method('PUT')
                @csrf


                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Nome da Categoria</label>
                            <input type="text" class="form-control" id="editCategoriaInput" name="categoria" required>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        // ajax para criar a categoria sem recarregar a página

        $("#form-store-categorias").submit(function(e) {
            e.preventDefault();

            $.ajax({
                method: "POST",
                data: $(this).serialize(),
                url: $(this).attr('action'),
            }).done(function(data) {
                console.log(data)
                carregalista()
                myModal.hide();
                $("#form-store-categorias")[0].reset()
            }).fail(function(data) {

                $.toast({
                    title: "Atenção",
                    message: data.responseJSON.error,
                    type: "error",
                    duration: 2500,
                });
            })
        })

        function carregalista(url="{{ route('categorias.getcategorias') }}") {
            $.ajax({
                url: url,
                type: "GET",
                dataType: 'html',
                success: function(response){
                    $('#resposta').html(response);
                }
            })
        }

        carregalista()

       


        // Abre o Modal
        $("body").on('click', '.edit-categoria', function(e) {
            e.preventDefault();


            var route = $(this).attr('href');

            $.get(route, function(data) {
                $('#editCategoriaInput').val(data.nome);

                var updateUrl = "{{ route('categorias.update', ['id' => '']) }}/" + data.id;

                $('#form-update-categorias').attr("action", updateUrl);

            })
            var myModal = new bootstrap.Modal(document.getElementById('editModal'));
            myModal.show();
        });


        // Atualizar dados

        $("#form-update-categorias").submit(function(e) {
            e.preventDefault();

            $.ajax({
                method: "POST",
                data: $(this).serialize(),
                url: $(this).attr('action')
            }).done(function(data) { //define o que vai fazer quando deu certo
                console.log(data)
                carregalista()
                $('#editModal').modal('hide');
                $("#form-update-categorias")[0].reset()

            }).fail(function(data) { // define o que vai fazer quando dá erro

                $.toast({
                    title: "Atenção",
                    message: data.responseJSON.error,
                    type: "error",
                    duration: 2500,
                });
            })
        })



        // Deletar a categoria sem atualizar a página

        $("body").on('click', '.delete-categoria', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var url = "{{ route('categorias.destroy', ['id' => ':id']) }}".replace(':id', id);

            $.ajax({
                method: 'DELETE',
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {

                    carregalista()
                },

            })
        })

        $(document).on('click', '.pagination a',function(e) {
            e.preventDefault()

            var url = $(this).attr('href');
            carregalista(url);
        });
    </script>
@endsection
