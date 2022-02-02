@extends('base.basesec')

@section('title', 'Inicio')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 w-100 mb-3">
            <div class="card mb-3 text-center h-100">

                <div class="card-body">
                    <a href="{{ route('programarp') }}">
                        <img src="{{ asset('public/images/frontend/bannerFortalecimiento.png') }}" class=" img-fluid img-medium" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col">
            <img src="{{ asset('public/images/frontend/portada.jpeg') }}" class="img-fluid" />
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-12 text-center">
            <h3 class="mt-4 mb-4">
                Trabajamos para acompañarte e impulsar unidos y unidas la producción entrerriana.
            </h3>
            <h3 class="mt-4 mb-4">
                El ecosistema emprendedor y las MiPyMEs son claves para promover una economía provincial integrada,
                productiva, sostenible e innovadora.
            </h3>
            <h3 class="mt-4 mb-4">
                <strong>#VosSosImportante</strong>
            </h3>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 w-100 mb-3">
            <div class="card mb-3 text-center h-100">

                <div class="card-body">
                    <a href="{{ route('programasp') }}">
                        <img src="{{ asset('public/images/frontend/portadae.png') }}" class=" img-fluid img-medium" />
                    </a>
                </div>

            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 w-100 mb-3">

            <div class="card mb-3 text-center h-100">

                <div class="card-body">
                    <a href="https://www.entrerios.gov.ar/desarrolloemprendedor" target="_blank">
                        <img src="{{ asset('public/images/frontend/portadad.jpeg') }}" class=" img-fluid img-medium" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            @include('base.noticias')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

</div>


@endsection