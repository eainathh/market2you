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
    </style>
@endsection
@section('content')
    <div class="container mt-4">

        <div class="row justify-content-center">

            <div class="col px-4 md-4">

                <h1>Meus Locais</h1>

                <div class="header-local">
                    <h4>Listagem</h4>
                    <p class="d-inline-flex gap-1 pb-2">
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#addlocal" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Adicionar
                        </a>
                    </p>
                </div>

            </div>

            @if (session('success'))
                <div id="success-alert" class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="collapse " id="addlocal">
                <div class=" card-body">
                    <form action="{{ route('locais.store') }}" method="POST" id="form-store">
                        @csrf
                        <input type="text" class="form-control" name="local" required
                            placeholder="Digite o nome do local">
                        <button type="submit" class="btn btn-success mt-3">Salvar</button>
                    </form>
                </div>
            </div>
            

            <div id="resultado">

            </div>

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
        // Script para o modal de edição
        // var editModal = document.getElementById('editModal');
        // editModal.addEventListener('show.bs.modal', function(event) {
        //     var button = event.relatedTarget;
        //     var localId = button.getAttribute('data-id');
        //     var localNome = button.getAttribute('data-nome');

        //     var modalTitle = editModal.querySelector('.modal-title');
        //     var editLocalInput = editModal.querySelector('#editLocalInput');
        //     var editForm = editModal.querySelector('#editForm');

        //     modalTitle.textContent = 'Editar Local';
        //     editLocalInput.value = localNome;
        //     editForm.action = '/locais/' + localId;
        // });
        // // Script para o alerta de sucesso
        // document.addEventListener('DOMContentLoaded', function() {
        //     var alert = document.getElementById('success-alert');
        //     if (alert) {
        //         // Defina o tempo em milissegundos que o alerta ficará visível
        //         var displayTime = 3000;


        //         setTimeout(function() {
        //             alert.style.opacity = '0';
        //         }, displayTime);


        //         setTimeout(function() {
        //             alert.remove();
        //         }, displayTime + 500);
        //     }
        // });


        // ajax para criar o local sem recarregar a página
        $("#form-store").submit(function(e) {
            e.preventDefault();

            $.ajax({
                method: "POST",
                data: $(this).serialize(),
                url: $(this).attr('action'),
            }).done(function(data) {
                console.log(data)
                lista()
                $("#form-store")[0].reset()
                // $(".loading").fadeOut('fast')
            }).fail(function(data) {

                $.toast({
                    title: "Atenção",
                    message: data.responseJSON.error,
                    type: "error",
                    duration: 2500, // auto-dismiss after 5s
                });
                // $(".loading").fadeOut('fast')
            });


        })

        function lista()
        {
            var route= "{{route('locais.getlocais')}}";

            $.get(route,function(data){
                $('#resultado').html(data)
            })
        }
        
        lista()
        
        var myModal = new bootstrap.Modal(document.getElementById('editModal'))

        
        
        // Abre o Modal
        $("body").on('click', '.edit-local', function(e){
            e.preventDefault();

            var route = $(this).attr('href')

            $.get(route, function(data){
                $('#editLocalInput').val(data.nome)
                $('#editForm').attr("action","{{route('locais.update')}}/"+data.id)
                myModal.show()
            })

        })

        //Ajax para salvar os dados

        $("#editForm").submit(function(e){
            e.preventDefault();

            $.ajax({
                method: "POST",
                data: $(this).serialize(),
                url: $(this).attr('action'),
            }).done(function(data){
                console.log(data)
                lista()
                myModal.hide()
                ("#editForm")[0].reset()                
            }).fail(function(data){

                $.toast({
                    title: "Atenção",
                    message: data.responseJSON.error,
                    type: "error",
                    duration: 2500,
                });
            })
        })




    </script>
@endsection
