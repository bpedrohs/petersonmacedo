<!-- Modal -->
<div class="modal fade" id="details-{{$project->id}}" tabindex="-1" aria-labelledby="details-{{$project->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="details-{{$project->id}}Label">{{$project->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    @if ($project->resume)
                        <li class="list-group-item">
                            <h1 class="fs-5"><strong>{{__('Resumo')}}</strong></h1>
                            <p class="m-0 text-muted">{{$project->resume}}</p>
                        </li>
                    @endif
                    <li class="list-group-item">
                        <h1 class="fs-5"><strong>{{__('Texto completo')}}</strong></h1>
                        <p class="m-0 text-muted">{{$project->text}}</p>
                    </li>
                    @if ($project->picture)
                        <li class="list-group-item">
                            <h1 class="fs-5"><strong>{{__('Imagem de destaque')}}</strong></h1>
                            <img class="img-fluid" src="{{ $project->picture }}" alt="" srcset="">
                        </li>
                    @endif
                    <li class="list-group-item">
                        <h1 class="fs-5"><strong>{{__('Url')}}</strong></h1>
                        <a href="{{config('app.url')}}{{__('projects/')}}{{ $project->slug }}">{{config('app.url')}}{{__('projects/')}}{{ $project->slug }}</a>
                    </li>
                    @if ($project->picture)
                        <li class="list-group-item">
                            <h1 class="fs-5"><strong>{{__('Data')}}</strong></h1>
                            <p class="m-0 text-muted">{{$project->date}}</p>
                        </li>
                    @endif
                    <li class="list-group-item">
                        <h1 class="fs-5"><strong>{{__('Categorias')}}</strong></h1>
                        <p class="m-0 text-muted">
                            <ul>
                                @foreach($project->categories as $category)
                                    <li>{{$category->name}}</li>
                                @endforeach
                            </ul>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-exit" data-bs-dismiss="modal">{{__('Fechar')}}</button>
            </div>
        </div>
    </div>
</div>
