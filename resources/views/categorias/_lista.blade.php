@foreach ($categorias as $categoria)
                <div class="listagem card p-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>{{ $categoria->nome }}</h3>
                        <div>
                            <a href="{{route('categorias.edit',['id'=>$categoria->id])}}" class=" btn-sm btn-outline-primary edit-categoria">
                                <i class="fa-solid icone fa-pen"></i>
                            </a>
                            
                            {{-- <a href="#" class="btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="{{ $categoria->id }}"
                                data-nome="{{ $categoria->nome }}">
                                <i class="fa-solid icone fa-pen"></i>
                            </a> --}}


                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm delete-categoria btn-outline-danger" data-id="{{$categoria->id}}"
                                    style="border: none; background: none; padding: 0;">
                                    <i class="fa-solid icone fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
            @endforeach