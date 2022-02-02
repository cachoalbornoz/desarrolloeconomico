@extends('base.base')

@section('title', 'Listar noticias')

@section('breadcrumb')
{!! Breadcrumbs::render('noticia') !!}
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Noticias
                    <small>
                        <a href="{{ route('noticias.create') }}" class="btn btn-link">(+) Crear</a>
                    </small>
                </h5>
            </div>

            <div class="card-body">

                {!! Form::open(['route' => 'noticias.destroy']) !!}
                {!! Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="noticias">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Fecha</th>
                                <th>Titulo</th>
                                <th>Subtitulo</th>
                                <th>Publicada</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $(function () {
        var table = $('#noticias').DataTable({
            scrollCollapse  : true, //Esto sirve que se auto ajuste la tabla al aplicar un filtro
            lengthMenu      : [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
            dom             : '<"wrapper"Brflit>',
            buttons         : ['copy', 'excel', 'pdf', 'colvis'],
            ordering        : false,
            stateSave       : true,
            processing      : true,
            serverSide      : true,
            language        : { "url": "{{ url('public/DataTables/spanish.json') }}" },
            ajax: "{{ route('noticias.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class:"text-center"},
                {data: 'fecha', searchable: false, class:"col-1 text-center"},
                {data: 'titulo'},
                {data: 'subtitulo'},
                {data: 'estado',searchable: false, class:"text-center"},
                {data: 'editar',searchable: false, class:"text-center"},
                {data: 'borrar',searchable: false, class:"text-center"},
            ]
        });
    })

    $(document).on("click", ".borrar", function(){

        var texto   = '&nbsp; Elimina registro ? &nbsp;';
        var id      = this.id;

        ymz.jq_confirm({
            title:texto,
            text:"",
            no_btn:"Cancelar",
            yes_btn:"Confirma",
            no_fn:function(){
                return false;
            },
            yes_fn:function(){

                $.ajax({
                    url 	: "{{ route('auditoria.accion') }}",
                    type 	: 'POST',
                    dataType: 'json',
                    data 	: {accion: 'editar'},
                    data 	: {accion: 'borrar'},
                    success: function(){
                        table.ajax.reload();
                    }
                });
            }
        });
    });
</script>

@endsection