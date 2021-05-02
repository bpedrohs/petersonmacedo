<div class="modal fade" id="delete-{{$user->id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.user.destroy', ['user' => $user->id])}}" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Excluir')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{__('Deseja excluir o usuário')}} <strong>{{$user->name}}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-exit" data-bs-dismiss="modal">{{__('Fechar')}}</button>
                    <button type="submit" class="btn btn-delete">{{__('Excluir')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
