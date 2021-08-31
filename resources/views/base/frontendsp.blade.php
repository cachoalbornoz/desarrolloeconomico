@extends('base.base')

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
                <img src="{{ asset('public/images/frontend/portadasp.png') }}" class=" img-fluid" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <a href={{ route('programarp') }}>
                    <img src="{{ asset('public/images/frontend/bannerFortalecimiento.png') }}" class=" img-fluid" />
                </a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row mt-3 mb-5">
            <div class="col-xs-12 col-md-6 col-lg-6">
                <a class="text-dark" href={{ route('pafinanciera') }}>
                    <h5 class="favenir mb-3">
                        PROGRAMA DE ASISTENCIA FINANCIERA PARA EL SOSTENIMIENTO PRODUCTIVO
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
                    <img src="{{ asset('public/images/frontend/prog_financ_cooperativas.png') }}" class=" img-fluid" />
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
