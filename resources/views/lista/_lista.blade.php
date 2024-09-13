<div class="d-flex justify-content-between align-items-center">
    <p class="fw-bold mt-1">Listagem</p>
    <p>x/xx</p>
</div>

<hr>
@foreach ($itens as $item)
    <div class="row align-items-end mb-3">
        <div class="col-lg-2 mb-3">
            <div class="input">
                <h3>{{ $item->nome }}</h3>
            </div>
        </div>
        <div class="col-4 col-lg-2 mb-3">
            <input type="number" name="qtd" placeholder="Qtd" class="form-control" min="1">
        </div>
        <div class="col-5 col-lg-2 mb-3">
            <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="text" name="valor_unitario" class="form-control" aria-label="Valor do item"
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
