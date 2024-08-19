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

            @if (session('success'))
            <div id="success-alert" class="alert alert-success" role="alert">
                {{ session('success') }}
                </div>
            @endif

            <div class="collapse" id="addcategoria">
                <div class="card-body">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="categoria"
                            placeholder="Digite o nome da categoria">
                        <button type="submit" class="btn btn-success mt-2">Salvar</button>
                    </form>
                </div>
            </div>
            @foreach ($categorias as $categoria)
                <div class="listagem card p-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>{{ $categoria->nome }}</h3>
                        <div>



                            <a href="#" class="btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="{{ $categoria->id }}"
                                data-nome="{{ $categoria->nome }}">
                                <i class="fa-solid icone fa-pen"></i>
                            </a>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-outline-danger" style="border: none; background: none; padding: 0;">
                                        <i class="fa-solid icone fa-trash"></i>
                                    </button>
                                </form>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-auto text-center">

            {!! $categorias->links() !!}

        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
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
        // Script para o modal de edição
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var categoriaId = button.getAttribute('data-id');
            var categoriaNome = button.getAttribute('data-nome');

            var modalTitle = editModal.querySelector('.modal-title');
            var editCategoriaInput = editModal.querySelector('#editCategoriaInput');
            var editForm = editModal.querySelector('#editForm');

            modalTitle.textContent = 'Editar Categoria';
            editCategoriaInput.value = categoriaNome;
            editForm.action = '/categorias/' + categoriaId;
        });

        // Script para o alerta de sucesso
        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                // Defina o tempo em milissegundos que o alerta ficará visível
                var displayTime = 3000; 


                setTimeout(function() {
                    alert.style.opacity = '0'; 
                }, displayTime);

                
                setTimeout(function() {
                    alert.remove();
                }, displayTime + 500); 
            }
        });
    </script>
@endsection