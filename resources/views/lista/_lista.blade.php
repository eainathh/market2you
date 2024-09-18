<div class="d-flex justify-content-between align-items-center">
    <p class="fw-bold mt-1">Listagem</p>
    <p>x/xx</p>
</div>

<hr>
<form action="" method="POST" id='formitenscompras'>

    <input type="hidden" name="id_itemcompra">

@foreach ($itens as $item)
    <div class="row align-items-end mb-3">

        {{-- nome do item --}}
        <div class="col-lg-2 mb-3">
            <div class="input">
                <h4>{{ $item->nome }}</h4>
            </div>
        </div>

        {{-- quantidade --}}
        <div class="col-4 col-lg-2 mb-3">
            <input type="number" name="qtd" id="qtd" placeholder="Quantidade" class="form-control">
        </div>

        {{-- valor unitario --}}
        <div class="col-5 col-lg-2 mb-3">
            <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="text" name="valor_unitario" id="valor_unitario" class="form-control" aria-label="Valor do item"
                    placeholder="Valor">
            </div>
        </div>
        <div class="col mb-3">
            <button class="btn btn-success" id="btn-add">+</button>
        </div>
    </div>
@endforeach

<div class="d-flex justify-content-around align-items-center">
    <button class="btn btn-success" id="btn-finalize">Finalizar</button>
    <p class="mb-0"><strong id="total-value">R$ 0,00</strong></p>
</div>
</form>

@section('scripts')

<script>



</script>

@endsection
