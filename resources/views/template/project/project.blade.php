@extends('layouts.template')

@section('content')
    <div class="container">
        <article class="row">
            <div class="col-12 mb-5">
                <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($project->photos as $name)
                            <div class="carousel-item @if($loop->first) active @endif" data-interval="10000">
                                <img src="{{asset('storage/' . $name->photo)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    @foreach ($project->photos as $photo)
                        @if ($photo->count() > 1)
                            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <section class="col-12 col-md-8 mb-3">
                <h1 class="title-project">{{ __('Descrição Do Projeto') }}</h1>
                <p class="lead">{{ $project->text }}</p>
            </section>

            <section class="col-12 col-md-4 mb-3">
                <h2 class="title-project">{{ __('Detalhes Do Projeto') }}</h2>

                <div class="project-details">
                    <h3 class="title-details">{{ __('Categorias:') }}</h3>
                    <p class="">
                        @foreach ($project->categories as $category)
                            <ul>
                                <li>{{ $category->name }}</li>
                            </ul>
                        @endforeach
                    </p>

                    @if($project->date)
                        <h3 class="title-details">{{ __('Data do Projeto:') }}</h3>
                        <p class="">{{$project->date}}</p>
                    @endif

                    {{-- <h3 class="title-details">{{ __('URL do Projeto:') }}</h3>
                    <p class=""></p> --}}
                </div>
            </section>
        </article>
    </div>
@endsection
