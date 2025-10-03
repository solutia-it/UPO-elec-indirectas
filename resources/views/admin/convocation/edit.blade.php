@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="row mt-1">
        <div class="col-md-12 mb-3">
            <h1>Crear Convocatoria</h1>
        </div>
        <div class="col-md-12">
            <form id="publicationForm" method="POST" action="{{ route('admin.convocations.update', [$convocation->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('admin.convocation.components.form', ['disable' => false])
                    </div>
                </div>
                <div class="form-group col-12 d-flex mt-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
    <script type="text/javascript" src="{{ asset('js/admin/admin-convocations-form.js') }}"></script>
@endsection
