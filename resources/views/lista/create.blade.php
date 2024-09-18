@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col">
            <div class="header-local card">
                <div class="card-header">
                    <h3>Compra</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="form-lista">
                        <div class="row align-items-end">
                            <input type="hidden" name="id_lista" id="id_lista">

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-7">
                                <div class="mb-3">
                                    <label for="mercado" class="form-label">
                                        Mercado <i class="fas fa-shopping-cart"></i>
                                    </label>
                                    <select class="form-select mudanca" id="mercado" name="local_id">
                                        <option>Selecione</option>
                                        @foreach ($locais as $key => $local)
                                            <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-12 col-sm-12">
                                <div class="mb-3 col-md-4">
                                    <label for="meta" class="form-label">Meta orçamentária</label>
                                    <div class="input-group">
                                        <span class="input-group-text">R$</span>
                                        <input type="text" class="form-control mudanca" id="meta" name="meta"
                                            aria-label="Amount">
                                        <span class="input-group-text">,00</span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 col-md-6 col-xl-7">

                                @csrf
                                <div class="mb-3 row">
                                    <div class="input-group">
                                        <select class="form-select select2" id="itens-lista" name="item_id">
                                            <option value="" disabled selected>Buscar itens na lista</option>
                                            @foreach ($itens as $item)
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach
                                        </select>


                                        <button class="btn btn-success btn-sm ms-2" type="button"
                                            id="addItemButton">Adicionar</button>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="resultado">

                        </div>
                    </form>
                </div>


            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            function lista() {
                var route = "{{ route('itens.getitens') }}";

                $.get(route, function(data) {

                    $('#resultado').html(data)
                });
            }

            // add no itens compras

            $("body").on('click', '#addItemButton', function(e) {
                e.preventDefault();

                var nome = $('#itens-lista').val(); // PEGA O VALOR DO SELECT
                var itemName = $('#itens-lista option:selected').text();
                var listacompraId = $('input[name="id_lista"]').val();


                var route =
                    "{{ route('itenscompras.store') }}"; // aqui precisa criar o item na tabela itenscompras caso nao exista da tabela itens

                var data = {
                    nome: itemName,
                    listacompra_id: listacompraId,
                    _token: "{{ csrf_token() }}"
                };

                $.ajax({
                    method: "POST",
                    data: data,
                    url: route,
                }).done(function(data) {

                    lista();
                }).fail(function(data) {
                    console.error("Erro ao adicionar o item:", data.responseJSON);
                });
            });

            // Criando a lista de compra
            $(document).ready(function(e) {
                $('.mudanca').on('change', function() {

                    var route = "{{ route('compras.store') }}"
                    var formData = $('#form-lista').serialize();

                    $.ajax({
                        method: "POST",
                        url: route,
                        data: formData,

                    }).done(function(data) {

                        $('input[name="id_lista"]').val(data.id); // preenche com o id da lista

                    })

                })

            })

            $(document).ready(function(e) {
                $('#meta').on('change', function() {

                    var id = $('input[name="id_lista"]').val();
                    var route = "{{ route('compras.update') }}/" + id
                    var formData = $('#form-lista').serialize();

                    $.ajax({
                        method: 'PUT',
                        url: route,
                        data: formData,
                    }).done(function(data) {
                        // $('input[name="meta"]').val(data.meta);
                    })
                });


            });
        </script>
    @endsection
