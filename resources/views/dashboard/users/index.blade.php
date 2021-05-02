@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <nav class="breadcrumb-dashboard" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Usuários')}}</li>
            </ol>
        </nav>

        <div class="col-12 d-flex justify-content-center justify-content-md-end mb-2">
            @include('flash::message')
        </div>

        <h1 class="fs-3 fw-bolder">{{__('Usuários')}}</h1>
    
        <div class="col-12 col-md-6 mt-4">
            <a href="{{ route('admin.user.create') }}" class="btn btn-add">{{ __('Adicionar') }}</a>
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
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Ações') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count())
                        @foreach ($users as $user)
                            <tr data-bs-toggle="modal" data-bs-target="#details-{{$user->id}}">
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button type="button" class="btn btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#edit-{{ $user->id }}" id="edit">{{ __('Editar') }}</button>
                                    <button type="button" class="btn btn-delete" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $user->id }}">{{ __('Excluir') }}</button>
                                </td>
                            </tr>
        
                            @include('dashboard.users.edit')
                            @include('dashboard.users.delete')
                            @include('dashboard.users.details')
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="4">
                                {{__('Nehum usuário encontrado.')}}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection