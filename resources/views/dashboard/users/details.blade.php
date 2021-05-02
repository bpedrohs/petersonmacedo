<!-- Modal -->
<div class="modal fade" id="details-{{$user->id}}" tabindex="-1" aria-labelledby="details-{{$user->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="details-{{$user->id}}Label">{{__('Detalhes')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h1 class="fs-5"><strong>{{__('Nome')}}</strong></h1>
                        <p class="m-0 text-muted">{{$user->name}}</p>
                    </li>
                    @if ($user->email)
                        <li class="list-group-item">
                            <h1 class="fs-5"><strong>{{__('E-mail')}}</strong></h1>
                            <p class="m-0 text-muted">{{$user->email}}</p>
                        </li>
                    @endif
                    @if ($user->avatar)
                        <li class="list-group-item">
                            <h1 class="fs-5"><strong>{{__('Avatar')}}</strong></h1>
                            <img class="img-fluid rounded-circle" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                        </li>
                    @endif
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-exit" data-bs-dismiss="modal">{{__('Fechar')}}</button>
            </div>
        </div>
    </div>
</div>
