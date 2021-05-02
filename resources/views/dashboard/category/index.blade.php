@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <nav class="breadcrumb-dashboard" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Categorias')}}</li>
            </ol>
        </nav>

        <div class="col-12 d-flex justify-content-center justify-content-md-end mb-2">
            @include('flash::message')
        </div>

        <h1 class="fs-3 fw-bolder">{{__('Categorias')}}</h1>

        <div class="col-12 col-md-6 mt-4">
            <a href="{{ route('admin.category.create') }}" class="btn btn-add">{{ __('Adicionar') }}</a>
        </div>
    
        <div class="col-12 col-md-6 mt-4 d-flex justify-content-start justify-content-md-end">
            <input class="form-control input-search" type="search" id="input_seacrh" onkeyup="search()" placeholder="Pesquise por nomes.." title="Digite um nome...">
        </div>
    
        <div class="table-responsive">
            <table id="table_seacrh" class="table table-sm my-4 align-middle">
                <thead>
                    <tr>
                        <th scope="col">{{ __('#') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Descrição') }}</th>
                        <th scope="col">{{ __('Ações') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories->count())
                        @foreach ($categories as $category)
                            <tr data-bs-toggle="modal" data-bs-target="#details-{{$category->id}}">
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    {{ Str::limit($category->description, 100) }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#edit-{{ $category->id }}" id="edit">{{ __('Editar') }}</button>
                                    <button type="button" class="btn btn-delete" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $category->id }}">{{ __('Excluir') }}</button>
                                </td>
                            </tr>
        
                            @include('dashboard.category.edit')
                            @include('dashboard.category.delete')
                            @include('dashboard.category.details')
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">
                                {{__('Nehuma categoria encontrada.')}}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection

@section('script')
    @error('name')
        <script>
            new bootstrap.Modal(document.getElementById('edit-{{$category->id}}')).show();
        </script>
    @enderror
@endsection