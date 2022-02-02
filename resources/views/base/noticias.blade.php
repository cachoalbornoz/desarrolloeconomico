@if($noticias->count() >0)

<section class="news mt-5 mb-5">
    <div class="container mt-md-5">
        <h2 class="mx-4 my-0 text-center">Noticias recientes </h2>
    </div>
</section>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($noticias as $noticia)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <a href="{{ route('noticias.publicacion') }}">
                <img src="/economicoemprendedor/images/upload/noticias/{{ $noticia->imagen }}" class="d-block w-100 h-100">
                <div class="carousel-caption visible-lg visible-md visible-sm hidden-xs">
                    <h4 class=" text-center">{{ $noticia->titulo }}</h4>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif