@extends('base.base')

@section('title', 'Inicio')

@section('stylesheet')

@endsection

@section('content')

<div class="container">

    <div class="row mt-5 mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <h4 class="mx-4 my-0">Noticias recientes </h4>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <hr>
        </div>
    </div>


    @foreach ($noticias as $noticia)
    <div class="row mb-3">
        <div class="col-md-5 pl-5 pr-5">
            <img src="/economicoemprendedor/images/upload/noticias/{{ $noticia->imagen }}" class="card-img" height="250px" width="200px" />
        </div>
        <div class="col-md-7">
            <p> {{ $noticia->fecha_publicacion }} ({{  \Carbon::parse($noticia->fecha_publicacion)->diffForHumans() }})</p>
            <h5 class=" text-muted"> <i class=" fa fa-arrow-alt-circle-right"></i> {{ $noticia->titulo }} </h5>
            <p class=" text-muted"> {{ $noticia->cuerpo }} </p>
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


<script type=" text/javascript">

</script>
@endsection