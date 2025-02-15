@extends('layouts.app')

@section('assets')

    <style>
        .header-local {
            display: flex;
            justify-content: space-between;

        }



        .icone {
            font-size: 15px;
            margin-right: 15px;
        }

        .page-icon {
            font-size: 25px;
            line-height: 1;
            display: flex;

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

        #resultado {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;

        }
    </style>
@endsection
@section('content')
    <div class="container mt-4">

        <div class="row justify-content-center">

            <div class="col px-4 md-4">

                <h1>Meus Locais</h1>

                <div class="header-local">
                    <h4></h4>
                    <p class="d-inline-flex gap-1 pb-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" id="criar-local"href="#criarModal" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Adicionar
                        </button>
                    </p>
                </div>

            </div>

            @if (session('success'))
                <div id="success-alert" class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- <div class="collapse " id="addlocal">
                <div class=" card-body">
                    <form action="{{ route('locais.store') }}" method="POST" id="form-store">
                        @csrf
                        <input type="text" class="form-control" name="local" required
                            placeholder="Digite o nome do local">
                        <button type="submit" class="btn btn-success mt-3">Salvar</button>
                    </form>
                </div>
            </div> --}}


            <div id="resultado">

            </div>

        </div>
    </div>


    <div class="modal fade" id="criarModal" tabindex="-1" aria-labelledby="criarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('locais.store') }}" id="criarForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="criarModalLabel">Cadastrar local</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="local" class="form-label">Novo local</label>
                            <input type="text" class="form-control" name="local" id="criarLocalInput" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Local</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="local" class="form-label">Editar Local</label>
                            <input type="text" class="form-control" id="editLocalInput" name="local" required>
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
        // ajax para criar o local sem recarregar a página
        // $("#formcriarModal").submit(function(e) {
        //     e.preventDefault();

        //     $.ajax({
        //         method: "POST",
        //         data: $(this).serialize(),
        //         url: $(this).attr('action'),
        //     }).done(function(data) {
        //         console.log(data)
        //         lista()
        //         $("#form-store")[0].reset()

        //     }).fail(function(data) {

        //         $.toast({
        //             title: "Atenção",
        //             message: data.responseJSON.error,
        //             type: "error",
        //             duration: 2500, // auto-dismiss after 5s
        //         });

        //     });


        // })

        $(document).ready(function() {
            // Submissão do formulário de criação via AJAX
            $('#criarForm').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var url = form.attr('action');
                var data = form.serialize();

                $.ajax({
                    method: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        lista();
                        $('#criarModal').modal('hide');
                        form[0].reset();
                        $.toast({

                        });
                        
                        // alert('Local cadastrado com sucesso!');
                    },
                    error: function(xhr) {
                        alert('Erro ao cadastrar o local. Por favor, tente novamente.');
                    }
                });
            });
        });



        function lista(url = "{{ route('locais.getlocais') }}") {
            $.ajax({
                url: url,
                type: "GET",
                dataType: 'html',

                success: function(response) {
                    $('#resultado').html(response)
                },
            });
        }
        lista()


        var myModal = new bootstrap.Modal(document.getElementById('editModal'))
        var criarModal = new bootstrap.Modal(document.getElementById('criarModal'))


        // Abre o Modal
        $("body").on('click', '.edit-local', function(e) {
            e.preventDefault();

            var route = $(this).attr('href')

            $.get(route, function(data) {
                $('#editLocalInput').val(data.nome)
                $('#editForm').attr("action", "{{ route('locais.update') }}/" + data.id)
                myModal.show()
            })

        })

        //Ajax para salvar os dados

        $("#editForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                method: "POST",
                data: $(this).serialize(),
                url: $(this).attr('action'),
            }).done(function(data) {
                console.log(data)
                lista()
                myModal.hide()
                    ("#editForm")[0].reset()
            }).fail(function(data) {

                $.toast({
                    title: "Atenção",
                    message: data.responseJSON.error,
                    type: "error",
                    duration: 2500,
                });
            })
        })


        // Deletando local sem atualizar a página

        $("body").on('click', '.delete-local', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var url = "{{ route('locais.destroy', ['id' => ':id']) }}".replace(':id', id);

            $.ajax({
                method: 'DELETE',
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {

                    lista();
                },

            })

        })

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault()

            var url = $(this).attr('href');
            lista(url);
        });
    </script>
@endsection
