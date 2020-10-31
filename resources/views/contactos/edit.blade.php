@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-inline-flex">
                        <b>Editar petición de contacto</b>
                        <a href="{{ route('contactos.index') }}" class="btn btn-primary ml-auto">
                            <i class="fa fa-arrow-left"> Volver</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contactos.update', $contacto->idformulario) }}" method="POST"
                              enctype="multipart/from-data" id="create">
                            @method('PUT')
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <label> ID del formulario:</label>
                                    <input type="text" class="form-control" name="idformulario"
                                           value="{{ (isset($contacto))?$contacto->idformulario:old('idformulario')}}"
                                           readonly>
                                    @include('contactos.partials.form')
                                </div>
                                <div class="col-1">
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row">


                            <div class="col-1">
                            </div>
                            <div class="col-10">
                                <button class="btn btn-primary" form="create">
                                    <i class="fa fa-save"></i>
                                    Guardar cambios
                                </button>
                                <button class="btn btn-danger" form="delete_{{ $contacto->idformulario }}"
                                        onclick="return confirm('¿Está usted seguro de eliminar el registro?')">
                                    <i class="fa fa-trash"></i>
                                    Eliminar
                                </button>
                                <form action="{{ route('contactos.destroy', $contacto->idformulario) }}"
                                      id="delete_{{ $contacto->idformulario }}" method="post"
                                      enctype="multipart/from-data" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
