@extends('layouts.dashboard')

@section('content')
    <nav class="breadcrumb-dashboard" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">{{__('Painel de controle')}}</li>
        </ol>
    </nav>

    <section class="row">
        <div class="col-12 col-xl-4 mb-3">
            <div class="card card-count">
                <div class="card-body">
                    <h5 class="card-title">{{__('Gestão de projetos')}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{__('Total de projetos adicionados')}}</h6>
                    <p class="card-text">{{$ProjectScore}}</p>
                    <a href="{{route('admin.project.index')}}" class="card-link">{{__('Ver sobre')}}</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 mb-3">
            <div class="card card-count">
                <div class="card-body">
                    <h5 class="card-title">{{__('Gestão de projetos')}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{__('Total de categorias adicionadas:')}}</h6>
                    <p class="card-text">{{$CategoryScore}}</p>
                    <a href="{{route('admin.category.index')}}" class="card-link">{{__('Ver sobre')}}</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 mb-3">
            <div class="card card-count">
                <div class="card-body">
                    <h5 class="card-title">{{__('Usuários')}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{__('Total de usuários')}}</h6>
                    <p class="card-text">{{$UserScore}}</p>
                    <a href="{{route('admin.user.index')}}" class="card-link">{{__('Ver sobre')}}</a>
                </div>
            </div>
        </div>
    </section>
@endsection