@if($noticias->count() >0)

<section class="news mt-5 mb-5">
    <div class="container mt-md-5">
        <h2 class="mx-4 my-0 text-center favenir">Noticias recientes </h2>
    </div>
</section>


<div class="offset-2 col-8">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($noticias as $noticia)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="card shadow-lg mb-3 bg-white rounded">
                    <a href="{{ route('noticias.publicacion') }}">
                        <img src="/economicoemprendedor/images/upload/noticias/{{ $noticia->imagen }}" style=" width: auto; height: 600px; max-height: 600px;">
                        <div class="carousel-caption visible-lg visible-md visible-sm hidden-xs">
                            <p class=" text-center favenir">{{ $noticia->titulo }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        &nbsp;
    </div>
</div>

@endif