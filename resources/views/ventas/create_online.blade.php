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
                        <input type="text" class="form-control" id="floatingCedula" placeholder="Cedula" name="cedula" required>
                        <label for="floatingCedula">Cedula:</label>
                      </div>
                  </div>
                  <input type="hidden" class="form-control" id="floatingEvento"  name="eventos_id" placeholder="{{$numero->eventos->id}}" value="{{$numero->eventos->id}}" required>
                  <input type="hidden" class="form-control" id="floatingNumero"  name="numeros_id" placeholder="{{$numero->numero}}" value="{{$numero->id}}" required>
                  <input type="hidden" class="form-control" id="floatingTotal"  name="valor" placeholder="{{$numero->eventos->valor}}" value="{{$numero->eventos->valor}}" required>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNombre" placeholder="Nombre" name="nombre" required>
                            
                          <label for="floatingNombre">Nombre:</label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingApellido" placeholder="Apellido" name="apellido" required>
                          <label for="floatingApellido">Apellido:</label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingDir" placeholder="Direccion" name="direccion" required>
                          <label for="floatingDir">Direccion:</label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-floating">
                          <input type="number" class="form-control" id="floatingTel" placeholder="Telefono" name="telefono" required>
                          <label for="floatingTel">Telefono:</label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" required>
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
                    <input type="hidden" class="form-control" id="floatingEstado"  name="estado" value="1" required>
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