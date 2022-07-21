@extends('base.base-sin-menu')

@section('title', 'Inicio')

@section('content')

<div class="container">

    <div class="row pb-3">
        <div class="col-xs-4 col-md-3 col-lg-3 text-center">
            <img class=" img-fluid" src="{{ asset('images/frontend/cabecera.png') }}" alt="Desarrollo Económico" />
        </div>
        <div class="col-xs-8 col-md-9 col-lg-9 text-center">
        </div>
    </div>

    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark favenir pb-3">

        <a id="navbar_top-brand" class="navbar-brand d-none" href="#">
            <img src="{{ asset('images/frontend/logo_er.png') }}" alt="logo" style=" width:40px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item">
                    <a href="https://www.entrerios.gov.ar/economicoemprendedor/" class="nav-link">
                        INICIO
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('noticias.publicacion') }}" class="nav-link">
                        NOTICIAS
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PROGRAMAS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <a class="dropdown-item" href={{ route('programarp') }}>
                            PROGRAMA FEDERAL DE FORTALECIMIENTO DE LA REACTIVACION PRODUCTIVA
                        </a>
                        <a class="dropdown-item" href={{ route('pafinanciera') }}>
                            ASISTENCIA FINANCIERA PARA LA CONSOLIDACION PRODUCTIVA
                        </a>
                        <a class="dropdown-item" href={{ route('patecnica') }}>
                            ASISTENCIA TECNICA PARA EL FORTALECIMIENTO MIPyME
                        </a>
                        <a class="dropdown-item" href="{{ route('pcooperativas') }}">
                            PROGRAMA DE FINANCIAMIENTO PARA COOPERATIVAS DE TRABAJO
                        </a>
                        <a class="dropdown-item" href="{{ route('pcapitalTrabajo') }}">
                            LÍNEAS DE CRÉDITO A TASA SUBSIDIADA JUNTO AL BANCO DE ENTRE RÍOS
                        </a>
                        <a class="dropdown-item" href="{{ route('pestrategicos') }}">
                            LÍNEAS DE CRÉDITOS PARA PROYECTOS ESTRATÉGICOS
                        </a>

                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ url('register') }}" class="nav-link">
                        REGISTRO
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link text-white">
                        INGRESAR
                    </a>
                </li>
            </ul>
        </div>
    </nav>

</div>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <img src="{{ asset('public/images/frontend/portadasp.png') }}" class=" img-fluid" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row mt-3 mb-5">
        <div class="col-xs-12 col-md-6 col-lg-6">
            <a class="text-dark" href={{ route('pafinanciera') }}>
                <h5 class="favenir mb-3">
                    PROGRAMA DE ASISTENCIA FINANCIERA PARA LA CONSOLIDACIÓN PRODUCTIVA
                </h5>
                <img src="{{ asset('public/images/frontend/prog_financ.png') }}" class=" img-fluid" />
            </a>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6">
            <a class="text-dark" href={{ route('patecnica') }}>
                <h5 class="favenir mb-3">
                    PROGRAMA DE ASISTENCIA TECNICA PARA EL FORTALECIMIENTO MiPYME
                </h5>
                <img src="{{ asset('public/images/frontend/prog_asistencia.png') }}" class=" img-fluid" />
            </a>
        </div>
    </div>

    <div class="row mt-5 mb-3">
        <div class="col-xs-12 col-md-6 col-lg-6">
            <a class="text-dark" href="{{ route('pcooperativas') }}">
                <h5 class="favenir mb-3">
                    PROGRAMA DE FINANCIAMIENTO PARA COOPERATIVAS DE TRABAJO
                </h5>
                <img src="{{ asset('public/images/frontend/prog_financ_cooperativas_grande.jpeg') }}" class=" img-fluid" />
            </a>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6">
            <a class="text-dark" href="{{ route('pcapitalTrabajo') }}">
                <h5 class="favenir mb-3">
                    LÍNEAS DE CRÉDITO A TASA SUBSIDIADA JUNTO AL BANCO DE ENTRE RÍOS
                </h5>
                <img src="{{ asset('public/images/frontend/prog_cap_reactivacion.png') }}" class=" img-fluid" />
            </a>
        </div>
    </div>

    <div class="row mt-5 mb-3">
        <div class="col-xs-12 col-md-6 col-lg-6">
            <a class="text-dark" href="{{ route('pestrategicos') }}">
                <h5 class="favenir mb-3">
                    LÍNEAS DE CRÉDITOS PARA PROYECTOS ESTRATÉGICOS
                </h5>
                <img src="{{ asset('public/images/frontend/prog_proyecto_estrategico.png') }}" class=" img-fluid" />
            </a>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6">

        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div class="row d-none">
        <div class="col-xs-12 col-sm-8 col-lg-8 align-self-center">
            <h4>Herramientas de Apoyo a la Producción</h4>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4 text-center">
            <a href="{{ route('calculadora') }}" title="Simulador de créditos">
                <img src="{{ asset('public/images/frontend/calculadora.jpg') }}" class=" img-fluid" />
            </a>
        </div>
    </div>



</div>


@endsection