@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="mb-5">
            <h1 class="fs-3 text-center">{{ __('Portfólio') }}</h1>
        </div>

        <div class="projects-container">

            <div class="row d-flex justify-content-center mb-3">
                <div id="category-buttons">
                    @if ($categories->count())
                        <button class="btn btn-port active" onclick="filterSelection('all')">{{__('Todas')}}</button>
                    @else
                        <p>{{__('Nehuma categoria cadastrada.')}}</p>
                    @endif
                    @foreach ($categories as $category)
                        <button class="btn btn-port" onclick="filterSelection('{{$category->name}}')">{{$category->name}}</button>
                    @endforeach
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                @foreach ($projects as $project)
                    <div class="column-portfolio col-12 col-md-6 col-lg-4 p-2 text-center @foreach ($project->categories as $category) {{$category->name}} @endforeach">
                        <div class="card border-0 text-white" id="portfolio-column-{{ $project->id }}">

                            @foreach ($project->photos as $photo)
                                <img src="{{asset('storage/' . $photo->photo)}}" class="card-img" alt="...">
                                @break
                            @endforeach

                            <div class="card-img-overlay text-left my-auto portfolio-info" id="portfolio-info-{{ $project->id }}">
                                <div class="h-100 d-flex flex-column align-items-start justify-content-center">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text">{{ $project->resume }}</p>
                                    <a href="{{route('project.show', ['project' => $project->slug])}}" class="btn btn-see-about">{{__('Ver Sobre')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    @foreach ($projects as $project)
        <script>
            $(document).ready(function() {
                $("#portfolio-column-{{ $project->id }}").hover(function() {
                    $("#portfolio-info-{{ $project->id }}").css({
                        "background-color": "#1d21243b",
                        "display" : "block"
                    });
                }, function() {
                    $("#portfolio-info-{{ $project->id }}").css("display", "none");
                });
            });
        </script>
            
    @endforeach

    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("category-buttons");
        var btns = header.getElementsByClassName("btn-port");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
            });
        }
    </script>

    <script>
        filterSelection("all")
        function filterSelection(c) {
          var x, i;
          x = document.getElementsByClassName("column-portfolio");
          if (c == "all") c = "";
          for (i = 0; i < x.length; i++) {
            columnPortRemoveClass(x[i], "d-block");
            if (x[i].className.indexOf(c) > -1) columnPortAddClass(x[i], "d-block");
          }
        }
        
        function columnPortAddClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
          }
        }
        
        function columnPortRemoveClass(element, name) {
          var i, arr1, arr2;
          arr1 = element.className.split(" ");
          arr2 = name.split(" ");
          for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
              arr1.splice(arr1.indexOf(arr2[i]), 1);     
            }
          }
          element.className = arr1.join(" ");
        }
        
        
        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("category-buttons");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }
    </script>
@endsection
