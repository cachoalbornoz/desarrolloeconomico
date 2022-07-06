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
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row mb-5">
        <div class="col">
            <img src="{{ asset('public/images/frontend/portada.jpeg') }}" class="img-fluid" />
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 w-100 mb-3">
            <div class="mb-3 text-center h-100">                
                <a href="{{ route('programasp') }}">
                    <img src="{{ asset('public/images/frontend/portadapymes.png') }}" class=" img-fluid img-medium" />
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 w-100 mb-3">
            <div class="mb-3 text-center h-100">
                <a href="https://www.entrerios.gov.ar/desarrolloemprendedor" target="_blank">
                    <img src="{{ asset('public/images/frontend/portadad.jpeg') }}" class=" img-fluid img-medium" />
                </a>                
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