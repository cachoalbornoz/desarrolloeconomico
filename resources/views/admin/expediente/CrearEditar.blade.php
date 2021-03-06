@extends('base.base')

@section('title', 'Expedientes')

@section('breadcrumb')
{!! Breadcrumbs::render('expediente.create') !!}
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

@if (isset($expediente))
{{ Form::model($expediente, ['route' => ['expediente.update', $expediente->id], 'method' => 'put']) }}
@else
{!! Form::open([ 'route' => 'expediente.store' ]) !!}
@endif

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8">
                @if (isset($expediente))
                {{$expediente->Titular->NombreCompleto}}
                @endif
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">
                @if (isset($expediente))
                @include('admin.expediente.menuExpediente')
                @endif
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="row mb-3">

            <div class="col-xs-12 col-md-4 col-lg-4">
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            Titular
                        </span>
                    </div>
                    {!! Form::select('titular', $usuarios, null, ['autofocus' => 'true', 'class' => 'form-control', 'required' => 'true']) !!}

                </div>
            </div>

            <div class="col-xs-12 col-md-8 col-lg-8">
                @if (isset($expediente))
                {{ Form::hidden('expediente', $expediente->id) }}
                @endif

                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            Proyecto
                        </span>
                    </div>
                    {!! Form::select('proyecto', $proyectos, null, ['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-md-4 col-lg-4">
                {!! Form::label('nro_expediente', 'Nro de expediente') !!}
                {!! Form::text('nro_expediente', null, ['class' => 'form-control text-center', 'required']) !!}
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">
                {!! Form::label('nro_exp_madre', 'Nro Expediente Madre') !!}
                {!! Form::text('nro_exp_madre', null, ['class' => 'form-control text-center', 'required']) !!}
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">
                {!! Form::label('nro_exp_control', 'Nro Expediente Control') !!}
                {!! Form::text('nro_exp_control', null, ['class' => 'form-control text-center', 'required']) !!}
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-md-4 col-lg-4">
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            Monto $
                        </span>
                    </div>
                    {!! Form::number('monto', null, ['id' =>'monto', 'required', 'class' => 'form-control text-center', 'min' => 0, 'max' => '99999999', 'onkeyup' => 'imposeMinMax(this)']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">

                @if (isset($expediente))
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text text-danger">
                            Saldo cr??dito
                        </span>
                    </div>
                    {!! Form::number('saldo', null, ['id' =>'saldo', 'required', 'class' => 'form-control text-center', 'min' => 0, 'max' => '99999999', 'onkeyup' => 'imposeMinMax(this)', 'step'=>'any']) !!}
                </div>
                @endif
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">
                <div class="input-group">
                    <div class=" input-group-prepend">
                        <span class="input-group-text">
                            Fecha otorgamiento
                        </span>
                    </div>
                    {!! Form::date('fecha_otorgamiento', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-md-4 col-lg-4">
                <label>Provincia</label>
                {!! Form::select('provincia', $provincia, $idprovincia, ['id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Seleccione ...', 'required' => 'true']) !!}
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">
                <label>Ciudad</label>
                {!! Form::select('ciudad', $ciudad, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ...']) !!}
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">
                <label>
                    Rubro
                </label>
                {!! Form::select('rubro', $rubro, null, ['class' => 'form-control', 'placeholder' => 'Seleccione ...', 'required' => 'true']) !!}

            </div>
        </div>

        <div class="row mb-5">
            <div class="col-xs-12 col-md-10 col-lg-10">
                {!! Form::text('observaciones', null, ['class' => 'form-control', 'placeholder' => 'Observaciones del Expediente']) !!}
                <small>M??ximo 500 caracteres</small>
            </div>
            <div class="col-xs-12 col-md-2 col-lg-2 text-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

    </div>

</div>

{!! Form::close() !!}

@endsection

@section('js')

<script>


</script>

@endsection