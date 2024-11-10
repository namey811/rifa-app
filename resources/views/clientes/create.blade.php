@extends('layouts.app')


@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
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

                <form action="{{ route('clientes.store') }}" method="POST" class="row g-3">
                    @csrf <!-- Protección contra CSRF -->
                    <div class="col-md-4">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingCedula" placeholder="Cedula" name="cedula" required>
                        <label for="floatingCedula">Cedula:</label>
                      </div>
                  </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingNombre" placeholder="Nombre" name="nombre" required>
                          <label for="floatingNombre">Nombre:</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingApellido" placeholder="Apellido" name="apellido" required>
                          <label for="floatingApellido">Apellido:</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingDir" placeholder="Direccion" name="direccion" required>
                          <label for="floatingDir">Direccion:</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingTel" placeholder="Telefono" name="telefono" required>
                          <label for="floatingTel">Telefono:</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" required>
                          <label for="floatingEmail">Email:</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="floatingSelect" aria-label="Estado" name="estado" required>
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                          </select>
                          <label for="floatingSelect">Estado</label>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="{{route('clientes.index')}}" class="btn btn-info">
                            <i class=" ri-arrow-go-back-line"></i> Atras</a>
                      </div>
                    </form>

            </div>
        </div>
    </div>
  </section>
    
@endsection