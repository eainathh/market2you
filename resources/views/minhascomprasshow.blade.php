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
        }

        .card-header {
            padding: 50px;
        }

        .custom-icon-size {
            font-size: 2.5em;
        }

        .listagem {}

        .item-row {
            display: flex;
            flex-direction: column;
        }

        .item-name {
            font-weight: bold;
            font-size: 20px;
        }

        .item-details {
            font-size: 16px;
            color: #040A7D;
        }

        .total-value {
            font-weight: 700;
            font-size: 18px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row mb-4">
            @foreach ($compra->itens_compras as $item)
                <div class="col">
                    <h2 class="fw-bold">{{ $item->nome }}</h2>
            @endforeach
            <div class="header-local">
                <h4>Data da compra: {{ $compra->data->format('d/m/Y') }}</h4>
                <h4>Valor total: R${{ number_format($compra->valor_total, 2, ',', '.') }}</h4>
            </div>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-primary">Duplicar lista</button>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compra->itens_compras as $item)
                        <tr>
                            <td>
                                <div class="item-row">
                                    <div class="item-name">
                                        {{ $item->itens->nome }}
                                    </div>
                                    <div class="item-details">
                                        Valor Unitário: R$ {{ $item->valor_unitario }}
                                    </div>
                                    <div class="item-details">
                                        Quantidade: {{ $item->quantidade }}
                                    </div>
                                </div>
                            </td>
                            <td class="total-value">
                                Valor Total: R$ {{ $item->sub_total() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
