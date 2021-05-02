@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">

        <div class="col-12 d-flex justify-content-center justify-content-md-end mb-2 position-absolute position-absolute top-5 end-0">
            @include('flash::message')
        </div>

        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="profile-update" action="{{ route('admin.profile.update', ['user' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        
                        <div class="mb-3 row">
                            @if(isset(Auth::user()->avatar))
                            <div class="col-3 col-md-4 text-end">
                                <img src="{{Auth::user()->avatar}}" alt="" srcset="" class="rounded-circle" width="40" height="40">
                            </div>
                            @else
                            <div class="col-3 col-md-4 text-end d-flex align-items-center justify-content-end">
                                <img src="{{asset('/images/dashboard/avatar.jpg')}}" alt="" srcset="" width="40" height="40" class="rounded-circle">
                            </div>
                            @endif

                            <div class="col-9 col-md-8 d-flex flex-column">
                                <span class="h4 m-0">{{Auth::user()->name}}</span>
                                <button type="button" class="btn me-auto text-primary px-0" data-bs-toggle="modal" data-bs-target="#profile-photo">{{__('Alterar foto do perfil')}}</button>
                            </div>
                            @include('auth.modal-profile')
                        </div>

                        <div class="mb-3 row">
            
                            <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{__('Nome de usuário')}}</label>
            
                            <div class="col-12 col-md-8">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{Auth::user()->name}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
            
                            <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{__('Email')}}</label>
            
                            <div class="col-12 col-md-8">
                                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{Auth::user()->email}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
            
                            <div class="col-md-4"></div>
            
                            <div class="col-12 col-md-8">
                                <button type="submit" class="btn btn-primary">{{__('Enviar')}}</button>
                            </div>
                        </div>
            
                    </form>

                    <form id="profile-remove-photo" action="{{route('admin.profile.remove.photo', ['user' => Auth::user()->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
