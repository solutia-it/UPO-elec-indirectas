@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12 mb-4 text-end">
            <a href="{{ route('admin.convocations.create') }}" type="button" class="btn btn-primary">
                Nueva Convocatoria
            </a>
        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    Convocatorias de centro
                </div>
                <div class="card-body">
                    <table id="centerConvocationsTable" class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Convocatorias de departamento
                </div>
                <div class="card-body">
                    <table id="deparmentConvocationsTable" class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var urlGetCenterConvocations = "{{ route('admin.convocations.centers') }}";
        var urlGetDepartmentConvocations = "{{ route('admin.convocations.departments') }}";
    </script>
    <script type="text/javascript" src="{{ asset('js/admin/admin-convocations.js') }}"></script>
@endsection
