@extends('layouts.app')

@section('css-customize')
<link href="{{ asset('templates/niceadmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
@endsection

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
                <h5 class="card-title">Actualizacion de evento</h5>

                <form action="{{ route('eventos.update', $eventoresponsable->id) }}" method="POST" class="row g-3">
                    @csrf <!-- Protección contra CSRF -->
                    @method('PUT')
                    <div class="col-md-4">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingNombre" placeholder="Nombre" name="nombre" value="{{  old('nombre', $eventoresponsable->nombre)}}" required>
                        <label for="floatingNombre">Nombre:</label>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingDesc" placeholder="Descripcion" name="descripcion" value="{{  old('descripcion', $eventoresponsable->descripcion)}}" required>
                        <label for="floatingDesc">Descripcion:</label>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="Cifras" name="cifras" required>
                        <option value="2" selected>Dos Cifras</option>
                        <option value="3">Tres Cifras</option>
                      </select>
                      <label for="floatingSelect">Cifras:</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingValor" placeholder="Valor" name="valor" value="{{  old('valor', $eventoresponsable->valor)}}" required>
                      <label for="floatingNombre">Valor Boleto:</label>
                    </div>
                </div>
                  <div class="col-md-4">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingFecha" placeholder="Fecha Evento" name="fecha_evento" value="{{  old('fecha_evento',$eventoresponsable->fecha_evento)}}" required>
                        <label for="floatingFecha">Fecha Evento:</label>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="date" class="form-control" id="floatingFechaI" placeholder="Fecha Inicio" name="fecha_inicio" value="{{  old('fecha_inicio',$eventoresponsable->fecha_inicio)}}" required>
                      <label for="floatingFecha">Fecha Inicio:</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="floatingFecha" placeholder="Fecha Fin" name="fecha_fin" value="{{  old('fecha_fin',$eventoresponsable->fecha_fin)}}" required>
                    <label for="floatingFecha">Fecha Fin:</label>
                  </div>
              </div>
                  <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect2" aria-label="Responsable" name="responsables_id" required>
                          @foreach($responsables as $responsable)
                            <option value="{{$responsable->id}}">{{$responsable->nombre}} {{$responsable->apellido}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect2">Responsable:</label>
                      </div>
                    </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="{{route('eventos.index')}}" class="btn btn-info">
                            <i class=" ri-arrow-go-back-line"></i> Atras</a>
                      </div>
                    </form>

            </div>
        </div>
    </div>
  </section>
    
@endsection