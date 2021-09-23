@extends('base.base')

@section('title', 'Listar empresa')

@section('breadcrumb')
    {!! Breadcrumbs::render('empresa') !!}
@endsection

@section('content')


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h5>
                        Empresas Admin
                    </h5>
                </div>
            </div>
        </div>

        <div class="card-body">

            {!! Form::open(['route' => 'empresa.destroy']) !!}
            {!! Form::close() !!}

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" style="font-size: smaller" id="empresa">
                    <thead>
                        <tr>
                            <th>Editar</th>
                            <th>Razón Social </th>
                            <th>Titular</th>
                            <th>Actividad</th>
                            <th>Interés</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                            <th>Seg.</th>
                            <th>Cuit</th>
                            <th>Categoria</th>
                            <th>Ciudad</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


@endsection

@section('js')

    <script>
        var table = $('#empresa').DataTable({
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Todos"]
            ],
            dom: '<"wrapper"Brflit>',
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            order: [
                [1, "asc"]
            ],
            stateSave: true,
            processing: true,
            serverSide: true,
            language: {
                "url": "{{ url('public/DataTables/spanish.json') }}"
            },
            ajax: "{{ route('empresa.indexAdmin') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false,
                    class: "text-center"
                },
                {
                    data: 'razon_social',
                    name: 'razon_social',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'titular',
                    name: 'titular',
                    orderable: true,
                    searchable: true,
                },

                {
                    data: 'actividad',
                    name: 'actividad',
                    orderable: true,
                    searchable: true,
                    class: "w-25"
                },
                {
                    data: 'interes',
                    name: 'interes',
                    orderable: true,
                    searchable: false,
                },
                {
                    data: 'novedad',
                    name: 'novedad',
                    orderable: false,
                    searchable: false,
                    class: "text-center"
                },
                {
                    data: 'usuario',
                    name: 'usuario',
                    orderable: true,
                    searchable: true,
                    class: "text-center"
                },
                {
                    data: 'seguimiento',
                    name: 'seguimiento',
                    orderable: false,
                    searchable: false,
                    class: "text-center"
                },
                {
                    data: 'cuit',
                    name: 'cuit',
                    orderable: false,
                    searchable: true,
                    class: "text-center"
                },
                {
                    data: 'categoria1',
                    name: 'categoria1',
                    orderable: true,
                    searchable: false,
                },
                {
                    data: 'ciudad',
                    name: 'ciudad',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'borrar',
                    name: 'borrar',
                    orderable: false,
                    searchable: false,
                    class: "text-center"
                },
            ]
        });

        $('#empresa').on("click", ".borrar", function() {


            var texto = '&nbsp; Elimina empresa? &nbsp;';
            var id = this.id;

            ymz.jq_confirm({
                title: texto,
                text: "",
                no_btn: "Cancelar",
                yes_btn: "Confirma",
                no_fn: function() {
                    return false;
                },
                yes_fn: function() {

                    var token = $('input[name=_token]').val();

                    $.ajax({

                        url: "{{ route('empresa.destroy') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        dataType: 'json',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            table.ajax.reload();
                            toastr.options = {
                                "progressBar": true,
                                "showDuration": "300",
                                "timeOut": "1000"
                            };
                            toastr.error("&nbsp;", "Empresa eliminada ... ");
                        }
                    });
                }
            });
        });
    </script>

@endsection
