@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col">

            <div class="header-local card">
                <div class="card-header">
                    <h3>Compra</h3>
                </div>
                <div class="card-body">

                    <div class="row align-items-end">

                        <!-- Linha do Mercado -->
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-2">
                            <div class="mb-3">
                                <label for="mercado" class="form-label">
                                    Mercado <i class="fas fa-shopping-cart"></i>
                                </label>
                                <select class="form-select" id="mercado" name="local_id">
                                    <option>Selecione</option>
                                    @foreach ($locais as $key => $local)
                                        <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Linha da meta -->
                        <div class="col-12 col-sm-12">
                            <div class="mb-3 col-md-4">
                                <label for="meta" class="form-label">Meta orçamentária</label>
                                <div class="input-group">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" class="form-control" id="meta" aria-label="Amount">
                                    <span class="input-group-text">,00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Linha da pesquisa -->
                        <div class=" col-12 col-md-6 col-lg-4">
                            <div class="mb-3 row">
                                <div class="input-group">
                                    <select class="form-select select2" placeholder="Buscar itens na lista">
                                        <option value="" disabled selected>Buscar itens na lista</option>
                                        @foreach ($itens as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-info btn-sm ms-2" type="button"
                                        id="addItemButton">ADD</button>
                                    <input type="hidden" name="lista_id" value="{{ $listadecompras->first()->id }}">
                                    <!-- Use o ID da lista de compras -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-between align-items-center">
                        <p class="fw-bold">Listagem</p>
                        <p>10/100</p>
                    </div>

                    <hr>

                    <div class="row align-items-end mb-3">
                        <div class="col-sm mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Item</span>
                                <input type="text" class="form-control" aria-label="Item">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <input type="number" placeholder="Quantidade" class="form-control" pattern="\d*" />
                        </div>
                        <div class="col-md-auto col-6 mb-3">
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="text" class="form-control"
                                    aria-label="Valor do item"placeholder="Valor unitário">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <button class="btn btn-success" id="btn-advance">+</button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around align-items-center">
                        <button class="btn btn-success">Finalizar</button>
                        <p class="mb-0"><strong>R$ Valor total da compra</strong></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


   
@endsection
