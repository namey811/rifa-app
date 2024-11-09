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
                <h5 class="card-title">Creacion de ventas</h5>

                <form action="{{ route('ventas.store') }}" method="POST" class="row g-3">
                    @csrf <!-- Protección contra CSRF -->
                    
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="floatingSelect" aria-label="Cliente" name="clientes_id" required>
                            @foreach ($clientes as $item)
                            <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido}}</option> 
                            @endforeach
                          </select>
                          <label for="floatingSelect">Cliente:</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="floatingSelect2" aria-label="Numero" name="numeros_id" required>
                            @foreach ($numeros as $item)
                            <option value="{{$item->id}}">{{$item->numero}}</option> 
                            
                          </select>
                          <label for="floatingSelect2">Numero:</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingTotal" placeholder="Valor" name="valor" value="{{$item->valor}}" required>
                          <label for="floatingTotal">Valor:</label>
                        </div>
                        @endforeach
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