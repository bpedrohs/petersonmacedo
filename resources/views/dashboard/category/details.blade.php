<!-- Modal -->
<div class="modal fade" id="details-{{$category->id}}" tabindex="-1" aria-labelledby="details-{{$category->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="details-{{$category->id}}Label">{{$category->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h1 class="fs-5"><strong>{{__('Nome')}}</strong></h1>
                        <p class="m-0 text-muted">{{$category->name}}</p>
                    </li>
                    @if ($category->description)
                        <li class="list-group-item">
                            <h1 class="fs-5"><strong>{{__('Descrição')}}</strong></h1>
                            <p class="m-0 text-muted">{{$category->description}}</p>
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
