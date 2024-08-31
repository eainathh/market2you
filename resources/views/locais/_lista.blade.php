@foreach ($locais as $local)
                <div class="listagem card p-4">
                    <div class=" d-flex justify-content-between align-items-center">
                        <h3>{{ $local->nome }}</h3>
                        <div>
                            <a href="{{route('locais.edit',['id'=>$local->id])}}" class=" btn-sm btn-outline-primary edit-local">
                                <i class="fa-solid icone fa-pen"></i>
                            </a>
                            {{-- <a href="#" class=" btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="{{ $local->id }}" data-nome="{{ $local->nome }}">
                                <i class="fa-solid icone fa-pen"></i>
                            </a> --}}
                            <form action="{{ route('locais.destroy', $local->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm btn-outline-danger"
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
                            <p>5°</p>
                        </div>

                    </div>
                </div>
            @endforeach

         