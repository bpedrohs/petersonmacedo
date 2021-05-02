<!-- Modal -->
<div class="modal fade" id="edit-{{$category->id}}" tabindex="-1" aria-labelledby="edit-{{$category->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <form action="{{route('admin.category.update', ['category' => $category->id])}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-{{$category->id}}Label">{{__('Editar')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb">
                        @csrf
                        @method('put')
                    </div>

                    <div class="mb-3">
                        <h1 class="fs-3">{{__('Criar categoria')}}</h1>
                    </div>
        
                    <div class="mb-3">
                        <label for="name">{{__('Nome')}}</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Insira o nome.." value="{{$category->name}}">
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <span>{{__('Descrição')}}</span>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Conteúdo">{{$category->description}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-exit" data-bs-dismiss="modal">{{__('Fechar')}}</button>
                    <button type="submit" class="btn btn-save">{{__('Salvar alterações')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>