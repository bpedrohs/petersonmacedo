<div class="modal fade" id="delete-{{$category->id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.category.destroy', ['category' => $category->id])}}" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Excluir')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{__('Deseja excluir a categoria')}} <strong>{{$category->name}}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-exit" data-bs-dismiss="modal">{{__('Fechar')}}</button>
                    <button type="submit" class="btn btn-delete">{{__('Excluir')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
