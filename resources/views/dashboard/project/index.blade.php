@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <nav class="breadcrumb-dashboard" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Projetos')}}</li>
            </ol>
        </nav>

        <div class="col-12 d-flex justify-content-center justify-content-md-end mb-2">
            @include('flash::message')
        </div>

        <h1 class="fs-3 fw-bolder">{{__('Postagens de Projetos')}}</h1>

        <div class="col-12 col-md-6 mt-4">
            <a href="{{ route('admin.project.create') }}" class="btn btn-add">{{ __('Adicionar') }}</a>
        </div>
        <div class="col-12 col-md-6 mt-4 d-flex justify-content-start justify-content-md-end">
            <input class="form-control input-search" type="search" id="input_seacrh" onkeyup="search()" placeholder="Pesquise por títulos.." title="Digite um nome...">
        </div>

        <div class="table-responsive">
            <table id="table_seacrh" class="table table-sm my-4 align-middle">
                <thead>
                    
                    <tr>
                        <th scope="col">{{ __('#') }}</th>
                        <th scope="col">{{ __('Nome do projeto') }}</th>
                        <th scope="col">{{ __('Resumo') }}</th>
                        <th scope="col">{{ __('Texto completo') }}</th>
                        <th scope="col">{{ __('Imagem destaque') }}</th>
                        <th scope="col">{{ __('Url') }}</th>
                        <th scope="col">{{ __('Data do projeto') }}</th>
                        <th scope="col">{{ __('Categorias') }}</th>
                        <th scope="col">{{ __('Ações') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if($projects->count()) 
                        @foreach ($projects as $project)
                            <tr data-bs-toggle="modal" data-bs-target="#details-{{$project->id}}">
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>
                                <td>
                                    {{ Str::limit($project->resume, 100) }}
                                </td>
                                <td>
                                    {{ Str::limit($project->text, 100) }}
                                </td>
                                <td>
                                    @foreach ($project->photos as $photo)
                                        <img src="{{asset('storage/' . $photo->photo)}}" class="img-fluid d-md-block mx-auto" alt="..." width="40" height="40">
                                        @break
                                    @endforeach
                                </td>
                                <td>
                                    @if ($project->slug)
                                        <a href="{{config('app.url')}}{{__('projects/')}}{{ $project->slug }}">{{config('app.url')}}{{__('projects/')}}{{ $project->slug }}</a>
                                    @endif
                                </td>
                                <td>{{ $project->date }}</td>
                                <td>
                                    <ul>
                                        @foreach($project->categories as $category)
                                            <li>{{$category->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-edit" href="{{route('admin.project.edit', ['project' => $project->id])}}">{{ __('Editar') }}</a>
                                    <button type="button" class="btn btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#delete-{{ $project->id }}">{{ __('Excluir') }}</button>
                                </td>
                            </tr>

                            @include('dashboard.project.delete')
                            @include('dashboard.project.details')
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="9">{{__('Nenhum produto encontrado.')}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $projects->links() }}
        </div>
    </div>
@endsection