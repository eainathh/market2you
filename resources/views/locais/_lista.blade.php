@section('assets')
    <style>
.card-local {
width: 20%;



}
        </style>

@foreach ($locais as $local)
    <div class="listagem card p-4 card-local ">
        <div class=" d-flex justify-content-between align-items-center">
            <h3>{{ $local->nome }}</h3>
            <div>
                <a href="{{ route('locais.edit', ['id' => $local->id]) }}" class=" btn-sm btn-outline-primary edit-local">
                    <i class="fa-solid icone fa-pen"></i>
                </a>
                {{-- <a href="#" class=" btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="{{ $local->id }}" data-nome="{{ $local->nome }}">
                                <i class="fa-solid icone fa-pen"></i>
                            </a> --}}
                <form action="{{ route('locais.destroy', $local->id) }}" method="POST"style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-sm delete-local btn-outline-danger" data-id="{{ $local->id }}"
                        style="border: none; background: none; padding:0;">
                        <i class="fa-solid icone fa-trash"></i>
                    </button>
                </form>
            </div>

        </div>

        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-block gap-0">
                <p>Última compra</p>
                <p>00/00/0000</p>
            </div>
            <div>
                <p>Posição</p>
                <p>x°</p>
            </div>

        </div>
    </div>
@endforeach

<div class="d-flex justify-content-center mt-4">
    {{ $locais->links() }}
</div>
