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
        }

        .form-control+.form-control {
            margin-top: 15px;
            /* Ajuste o valor conforme necessário */
        }

        .card-header {
            padding: 50px;
        }

        .custom-icon-size {
            font-size: 2.5em;
        }

        .listagem {}
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col px-4 md-4">
                <h1>Minhas Compras</h1>
                <div class="header-local">
                    <h4>Listagem</h4>
                    <p class="d-inline-flex gap-1 pb-2">
                        <a class="btn btn-primary" href="{{ route('lista.create') }}" role="button">
                            Adicionar
                        </a>
                    </p>
                </div>
            </div>
        </div>


        @foreach ($listadecompras as $listadecompra)
            <div class="listagem card p-4">
                <div class=" d-flex justify-content-between align-items-center">
                    <h3>{{$listadecompra->local->nome }}</h3>
                    
                    <div>
                        <a href="{{ route('minhascompras.show') }}" class=" btn-sm btn-outline-primary">
                            <i class="fa-regular fa-eye custom-icon-size "></i>
                        </a>
                    </div>

                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-block gap-0">
                        <p>Última compra</p>
                        <p>{{$listadecompra->data}}</p>
                    </div>
                    <div>
                        <p>Posição</p>
                        <p>5°</p>
                    </div>
                    <div>
                        <p>Valor</p>
                        <p>R$ {{$listadecompra->valor_total}}</p>
                    </div>
                </div>
            </div>
            @endforeach
    </div>

    <div class="row justify-content-center">
        <div class="col-4 text-center">

            {!! $listadecompras->links() !!}

        </div>
    </div>
@endsection
