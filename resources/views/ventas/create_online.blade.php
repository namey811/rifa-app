@extends('layouts.app')


@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-9">
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Creacion de clientes</h5>

                <form action="{{ route('ventas.storeonline') }}" method="POST" class="row g-3">
                    @csrf <!-- Protección contra CSRF -->
                    <div class="col-lg-9">
                      <div class="form-floating">
                        <input type="number" class="form-control" placeholder="Cedula" name="cedula" id="cedula" value="{{ old('cedula') }}" required>
                        <label for="floatingCedula">Cedula:</label>
                      </div>
                     <!-- <span id="cedula-feedback" style="color: red;"></span>-->
                  </div>
                  <input type="hidden" class="form-control" id="floatingEvento"  name="eventos_id" placeholder="{{$numero->eventos->id}}" value="{{$numero->eventos->id}}" required>
                  <input type="hidden" class="form-control" id="floatingNumero"  name="numeros_id" placeholder="{{$numero->numero}}" value="{{$numero->id}}" required>
                  <input type="hidden" class="form-control" id="floatingTotal"  name="valor" placeholder="{{$numero->eventos->valor}}" value="{{$numero->eventos->valor}}" required>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNombre" placeholder="Nombre" name="nombre" value="{{ old('nombre') }}" required>
                            
                          <label for="floatingNombre">Nombre:</label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingApellido" placeholder="Apellido" name="apellido" value="{{ old('apellido') }}" required>
                          <label for="floatingApellido">Apellido:</label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingDir" placeholder="Direccion" name="direccion" value="{{ old('direccion') }}" required>
                          <label for="floatingDir">Direccion:</label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-floating">
                          <input type="number" class="form-control" id="floatingTel" placeholder="Telefono" name="telefono" value="{{ old('telefono') }}" required>
                          <label for="floatingTel">Telefono:</label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" value="{{ old('email') }}"required>
                          <label for="floatingEmail">Email:</label>
                        </div>
                    </div>
                    <!--
                    <div class="col-lg-9">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="floatingSelect" aria-label="Estado" name="estado" required>
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                          </select>
                          <label for="floatingSelect">Estado</label>
                        </div>
                      </div>
                    -->
                    <input type="hidden" class="form-control" id="floatingEstado"  name="estado" value="Activo" required>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="{{route('home')}}" class="btn btn-info">
                            <i class=" ri-arrow-go-back-line"></i> Atras</a>
                      </div>
                    </form>

            </div>
        </div>
    </div>

    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Numero Elegido</h5>
          <p class="card-text"><i class="ri-open-arm-line"> {{$numero->numero}}</i></p>
        </div>
      </div><!-- End Card with an image on bottom -->

    </div>
  </section>
    
@endsection
@section('js-customize')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function () {
            $('#cedula').on('change', function () {
                let cedula = $(this).val();

                if (cedula.length > 0) {
                    $.ajax({
                        url: "{{ route('validate.cedula') }}",
                        type: "GET",
                        data: { cedula: cedula },
                        success: function (response) {
                            if (response.exists) {
                                //$('#cedula-feedback').text('La cédula ya está registrada.');
                                let cliente = response.cliente[0];
                                $('#floatingNombre').val(cliente.nombre);
                                $('#floatingApellido').val(cliente.apellido);
                                $('#floatingDir').val(cliente.direccion);
                                $('#floatingTel').val(cliente.telefono);
                                $('#floatingEmail').val(cliente.email);
                            } else {
                                $('#cedula-feedback').text('');
                                $('#floatingNombre').val('');
                                $('#floatingApellido').val('');
                                $('#floatingDir').val('');
                                $('#floatingTel').val('');
                                $('#floatingEmail').val('');
                            }
                        },
                        error: function () {
                            $('#cedula-feedback').text('Error al validar la cédula.');
                        }
                    });
                } else {
                    $('#cedula-feedback').text('');
                }
            });
        });


</script>

@endsection