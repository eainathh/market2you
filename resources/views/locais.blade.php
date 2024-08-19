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
            <div class="collapse " id="addlocal">
                <div class=" card-body">
                    <form action="{{ route('locais.store') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="nome" placeholder="Digite o nome do local">
                        <button type="submit" class="btn btn-success mt-3">Salvar</button>
                    </form>
                </div>
            </div>
            @foreach ($locais as $local)
                <div class="listagem card p-4">
                    <div class=" d-flex justify-content-between align-items-center">
                        <h3>{{ $local->nome }}</h3>
                        <div>
                            <a href="#" class=" btn-sm btn-outline-primary">
                                <i class="fa-regular page-icon fa-eye custom-icon-size "></i>
                            </a>
                        </div>

                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-block gap-0">
                            <p>Última compra</p>
                            <p>25/12/1994</p>
                        </div>
                        <div>
                            <p>Posição</p>
                            <p>5°</p>
                        </div>
                        <div>
                            <p>Valor</p>
                            <p>R$ 510,26</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-4 text-center">

            {!! $locais->links() !!}

        </div>
    </div>
@endsection
