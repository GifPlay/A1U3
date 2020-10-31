@csrf
<div class="col-12">
    <div class="row">
        <div class="col-12">
            <h5>Nombre completo</h5>
        </div>

        <div class="col-4">
            <label for="">Nombre(s):</label>
            <input type="text" class="form-control" name="nombre"
                   value="{{ (isset($contacto))?$contacto->nombre:old('nombre')}}" maxlength="50" required>
        </div>
        <div class="col-4">
            <label for="">Apellido Paterno:</label>
            <input type="text" class="form-control" name="apellidoPaterno"
                   value="{{ (isset($contacto))?$contacto->apellidoPaterno:old('apellidoPaterno')}}" required>
        </div>
        <div class="col-4">
            <label for="">Apellido Materno:</label>
            <input type="text" class="form-control" name="apellidoMaterno"
                   value="{{ (isset($contacto))?$contacto->apellidoMaterno:old('apellidoMaterno')}}"   required>
        </div>
      </div>

    <label for="">Correo Electrónico:</label>
    <input type="email" class="form-control" name="email"
           value="{{ (isset($contacto))?$contacto->email:old('email')}}"   required>

    <label for="">Teléfono:</label>
    <input type="tel" class="form-control" name="telefono"
           value="{{ (isset($contacto))?$contacto->telefono:old('telefono')}}" maxlength="10"  required>

    <label for="">Descrición:</label>
    <input type="text" class="form-control" name="descripcion"
           value="{{ (isset($contacto))?$contacto->descripcion:old('descripcion')}}"   required>

</div>

