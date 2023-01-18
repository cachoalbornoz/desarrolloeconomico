@extends('base.base')

@section('title', 'Inicio')

@section('stylesheet')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection

@section('content')

    <div class="container">

        <div class="row mt-5 mb-5 favenir">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4 class="mx-4 my-0">Noticias recientes </h4>
            </div>
        </div>


        @foreach ($noticias as $noticia)
            <div class="card mt-5 mb-5 p-4 favenir">
                <div class="card-header bg-white">
                    <p> {{ $noticia->fecha_publicacion }}
                        ({{ \Carbon::parse($noticia->fecha_publicacion)->diffForHumans() }})
                    </p>
                    <h5 class=" text-muted"> <i class=" fa fa-arrow-alt-circle-right"></i> {{ $noticia->titulo }} </h5>
                </div>
                <div class="card-body">
                    <div class="row mt-5 mb-5">
                        <div class="col-md-5 pl-5 pr-5">
                            <img src="/economicoemprendedor/images/upload/noticias/{{ $noticia->imagen }}"
                                class="card-img" />
                        </div>
                        <div class="col-md-7">
                        </div>
                    </div>
                    <div class="row mt-5 mb-5">
                        <div class="col-md-12 pl-5 pr-5">
                            <p class=" text-muted"> {!! $noticia->cuerpo !!} </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row mt-3">
                        <div class="col-md-12 pl-5 pr-5">
                            <a href="https://www.youtube.com/channel/UCy0W_lkT1z66MrRN4FA9qAg" target="_blank">
                                <i class="fab fa-youtube text-danger"></i> Visitá nuestro canal en Youtube
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        <div class="row mt-5 mb-5">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

    </div>


@endsection

@section('js')

@endsection
