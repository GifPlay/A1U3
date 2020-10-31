@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-10">
                                <h5>Detalles del la petición de Contacto </h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('contactos.index') }}" class="btn btn-primary ml-auto">
                                    <i class="fa fa-arrow-left"> Volver</i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <p><b>ID:</b> {{ $contacto->idformulario }}</p>
                        <p><b>Nombre Completo: </b>{{ $contacto->nombre }} {{ $contacto->apellidoPaterno }} {{ $contacto->apellidoMaterno }}</p>
                        <p><b>Correo Electrónico: </b>{{ $contacto->email }}</p>
                        <p><b>Teléfono: </b>{{ $contacto->telefono }}</p>
                        <p><b>Descripción: </b> {{ $contacto->descripcion}}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('contactos.edit', $contacto->idformulario) }}">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
