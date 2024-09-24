<div class="d-flex justify-content-between align-items-center">
    <p class="fw-bold mt-1">Listagem</p>
    <p>x/xx</p>
</div>

<hr>
<form action="" method="POST" id='formitenscompras'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />




    @foreach ($itemCompra as $item)
        <div class="row align-items-center mb-3">

            {{-- nome do item --}}
            <div class="col-lg-1 col-3 mb-3 d-flex align-items-center">
                <div class="input">
                    {{ $item->item->nome }}
                </div>
            </div>

            {{-- quantidade --}}
            <div class="col-4 col-lg-1 mb-3">
                <input type="number" name="qtd[{{ $item->id }}]" id="qtd" value="{{ $item->quantidade }}"
                    placeholder="Qtd" class="form-control updatevalue">
            </div>

            {{-- valor unitario --}}
            <div class="col-4 col-lg-2 mb-3">
                <div class="input-group">
                    <span class="input-group-text">R$</span>
                    <input type="text" name="valor_unitario[{{ $item->id }}]" id="valor_unitario"
                        value="{{ $item->valor_unitario }}" class="form-control updatevalue" aria-label="Valor do item"
                        placeholder="Valor">
                </div>
            </div>

            <div class="col-lg-2 col-3 mb-3">
                <div class="input">

                    Valor Total: R$ {{ $item->valor_total }}

                </div>
            </div>

            {{-- <form action="#" method="POST" class="col-lg-5">
                @csrf
                @method('DELETE')
                <button type="submit" class="bbtn-sm delete-local btn-outline-danger col-lg-auto" data-id=""
                    style="border: none; background: none; padding: 0; display: flex; justify-content: center; align-items: center;">
                    <i class="fa-solid fa-trash" style="font-size: 16px;"></i>
                </button>
            </form> --}}

        </div>
    @endforeach

    <div class="d-flex justify-content-around align-items-center">
        <button class="btn btn-success" id="btn-finalize">Finalizar</button>
        Total Geral: R$ {{$itemCompra->sum('valor_total')}}
        
    </div>
</form>
