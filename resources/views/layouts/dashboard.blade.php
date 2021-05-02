<!DOCTYPE html>
<html lang="pt-br"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title', 'Dashboard') </title>

    <link rel="stylesheet" href="{{ url(mix('/css/dashboard/style.css')) }}">
    <link rel="icon" href="{{asset('/images/favicon.png')}}" type="image/png" sizes="16x16">
</head>

<body>

    <header class="navbar navbar-light sticky-top bg-light flex-md-nowrap shadow">
        <div class="container-fluid">
            <a href="" class="navbar-brand px-3">{{ config('app.name') }}</a>

            <button class="navbar-toggler d-md-none border-0 p-0 px-1" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <nav class="navbar navbar-expand-md p-0 m-0 d-none d-md-block">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link p-0" href="#" id="DropdownMenuDashboard"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(isset(Auth::user()->avatar))
                                <img src="{{Auth::user()->avatar}}" alt="" srcset="" width="40" height="40" class="rounded-circle">
                            @else
                                <img src="{{asset('/images/dashboard/avatar.jpg')}}" alt="" srcset="" width="40" height="40" class="rounded-circle">
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="DropdownMenuDashboard">
                            <li>
                                <h6 class="dropdown-header">
                                    @if(isset(Auth::user()->name))
                                        {{__('Olá, ')}}{{Auth::user()->name}}
                                    @endif
                                </h6>
                            </li>
                            <li>
                                @if(Auth::user()->id)
                                    <a class="dropdown-item @if(request()->routeIs('admin.profile')) active @endif" href="{{route('admin.profile')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                        </svg>
                                        {{__('Perfil')}}
                                    </a>
                                @endif
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right me-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                    {{ __('Sair') }} 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            {{-- nav menu --}}
            <nav id="sidebarMenu" class="col-md-4 col-lg-3 col-xl-2 d-md-block sidebar sidebar-sticky collapse p-0">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link @if (request()->routeIs('admin.index')) active @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-fill me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                </svg>
                                <span>{{ __('Painel de controle') }}</span>
                            </a>
                        </li>
                        <li class="nav-item d-md-none">
                            <a href="{{ route('admin.profile') }}" class="nav-link @if (request()->routeIs('admin.profile')) active @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                {{__('Perfil')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-collapse @if (request()->routeIs('admin.project.*') || request()->routeIs('admin.category.*')) active @endif"
                                data-bs-toggle="collapse" data-bs-target="#collapse-gdp" aria-expanded="false" aria-controls="collapse-gdp">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-kanban-fill me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11zm5 2h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm-5 1a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm9-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z" />
                                </svg>
                                <span>{{ __('Gestão de projetos') }}</span>
                            </a>
                                
                            <div class="collapse @if (request()->routeIs('admin.project.*') || request()->routeIs('admin.category.*')) show @endif" id="collapse-gdp">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.category.index') }}" class="nav-link nav-link-ps @if (request()->routeIs('admin.category.*')) active @endif">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-stack me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                                                <path
                                                    d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                                            </svg>
                                            <span>{{ __('Categorias') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.project.index') }}" class="nav-link nav-link-ps @if (request()->routeIs('admin.project.*')) active @endif">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-stack me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                                                <path
                                                    d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                                            </svg>
                                            <span>{{ __('Projetos') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link @if (request()->routeIs('admin.category.*')) active @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-stack me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                                    <path
                                        d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                                </svg>
                                <span>{{ __('Categorias') }}</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link @if (request()->routeIs('admin.user.*')) active @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-people-fill me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                                <span>{{ __('Usuários') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- content --}}
            <main class="col-md-8 ms-sm-auto col-lg-9 col-xl-10 p-2 p-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- scripts --}}

    {{-- bootstrap --}}
    {{-- <script src="{{ url(mix('js/dashboard/bootstrap.js')) }}"></script>
    <script src="{{ url(mix('js/dashboard/bootstrap.bundle.js')) }}"></script> --}}
    {{-- <script src="{{ url(mix('js/dashboard/createPopper.js')) }}"></script>
    --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>

    {{-- jquery --}}
    {{-- <script src="{{ url(mix('/js/jquery.min.js')) }}"></script>
    --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    {{-- custom --}}
    <script src="{{ url(mix('/js/dashboard/script.js')) }}"></script>

    @yield('script')
    <script>
        $('#btn-upload-image').bind("click", function() {
            $('#picture').click();
        });
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
</body>

</html>
