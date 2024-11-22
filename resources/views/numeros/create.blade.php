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
                <h5 class="card-title">Creacion de numeros</h5>

                <form action="{{ route('numeros.store') }}" method="POST" class="row g-3">
                    @csrf <!-- Protección contra CSRF -->
                    <div class="col-md-4">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingNombre" placeholder="Numero" name="numero" value="{{ old('numero') }} required>
                          <label for="floatingNombre">Numero:</label>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="floatingSelect" aria-label="Estado" name="estado" required>
                            <option value="Disponible" selected>Disponible</option>
                            <option value="Vendido">Vendido</option>
                          </select>
                          <label for="floatingSelect">Estado:</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="floatingSelect2" aria-label="Evento" name="eventos_id" required>
                            @foreach ($eventos as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option> 
                            @endforeach
                          </select>
                          <label for="floatingSelect2">Evento:</label>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="{{route('numeros.index')}}" class="btn btn-info">
                            <i class=" ri-arrow-go-back-line"></i> Atras</a>
                      </div>
                    </form>

            </div>
        </div>
    </div>
  </section>
    
@endsection