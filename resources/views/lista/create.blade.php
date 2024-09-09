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


                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-7">
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


                        <div class="col-12 col-md-6 col-xl-7">
                            
                                @csrf
                                <div class="mb-3 row">
                                    <div class="input-group">
                                        <select class="form-select select2" id="itens-lista" name="item_id"
                                            placeholder="Buscar itens na lista">
                                            <option value="" disabled selected>Buscar itens na lista</option>
                                            @foreach ($itens as $item)
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach
                                        </select>

                                        <button class="btn btn-success btn-sm ms-2" type="button"
                                            id="addItemButton">Add</button>
                                        <input type="hidden" name="lista_id" value="">

                                    </div>
                                </div>
                            
                        </div>
                    </div>

                    <div id="resultado">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function lista() {
            var route = "{{ route('itens.getitens') }}";

            $.get(route, function(data) {
                $('#resultado').html(data);
            });
        }

        lista();

        $("body").on('click', '#addItemButton', function(e) {
            e.preventDefault();

            var nome = $('#itens-lista').val();// PEGA O VALOR DO SELECT
            var itemName = $('#itens-lista option:selected').text();
            var route = "{{ route('item.store') }}";

            
           

            var data = {
                nome: itemName, 
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
    </script>
@endsection
