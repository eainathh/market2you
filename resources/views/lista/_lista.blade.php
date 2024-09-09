<div class="d-flex justify-content-between align-items-center">
    <p class="fw-bold mt-1">Listagem</p>
    <p>10/100</p>
</div>

<hr>

<div class="row align-items-end mb-3">
    <div class=" col-lg-3 mb-3 ">
        <div class="input-group">
            <span class="input-group-text">Item</span>
            <input type="text" class="form-control" aria-label="Item">
        </div>
    </div>
    <div class="col-4 col-lg-3 mb-3">
        <input type="number" name="qtd" placeholder="Qtd" class="form-control" pattern="\d*" />
    </div>

    {{-- valor unitário --}}
    <div class="col-5 col-lg-3 mb-3">
        <div class="input-group">
            <span class="input-group-text">R$</span>
            <input type="text" name="valor_unitario" class="form-control"
                aria-label="Valor do item"placeholder="Valor">
        </div>
    </div>
    <div class="col  mb-3">
        <button class="btn btn-success" id="btn-advance">+</button>
    </div>
</div>

<div class="d-flex justify-content-around align-items-center">
    <button class="btn btn-success">Finalizar</button>
    <p class="mb-0"><strong>R$ Valor total da compra</strong></p>
</div>


