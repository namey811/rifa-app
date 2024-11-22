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
                <h5 class="card-title">Creacion de ventas</h5>

                <form action="{{ route('ventas.store') }}" method="POST" class="row g-3">
                    @csrf <!-- Protección contra CSRF -->
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingCliente" aria-label="Cliente" name="clientes_id" required>
                          @foreach ($clientes as $item)
                          <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido}}</option> 
                          @endforeach
                        </select>
                        <label for="floatingCliente">Cliente:</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingEvento" aria-label="Evento" name="eventos_id" required>
                          <option value="">Seleccione un evento</option> 
                          @foreach ($eventosnumeros as $item)
                          <option value="{{$item->id}}">{{$item->nombre}}</option> 
                          @endforeach
                        </select>
                        <label for="floatingEvento">Eventos:</label>
                      </div>
                    </div>
                    <!-- PENDIENTE HACER EL CHECK DE SELLECCIONAR EL EVENTO CARGUE LOS NUMEROS ASOCIADOS A EL EVENTO -->
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingNumero" aria-label="Numero" name="numeros_id" required>
                          <option value="">Debes seleccionar un evento</option> 
                        </select>
                        <label for="floatingSelect2">Numero:</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingValor" placeholder="Valor" name="valor" value="{{ old('valor', "") }} required>
                        <label for="floatingValor">Valor Boleto:</label>
                      </div>
                  </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="{{route('ventas.index')}}" class="btn btn-info">
                            <i class=" ri-arrow-go-back-line"></i> Atras</a>
                      </div>
                    </form>

            </div>
        </div>
    </div>
  </section>
    
@endsection
@section('js-customize')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#floatingEvento').on('change', function() {
            var idSeleccionado = $(this).val();
            //PENDIENTE CORREGIR CUANDO EL VALOR DEL EVENTO ES DISTINTO 
            var textoSeleccionado = @json($eventosnumeros->first()->valor);
            console.log(textoSeleccionado);
            $('#floatingValor').val(textoSeleccionado);
            if (idSeleccionado) {
                $.ajax({
                    url: '/cargarlistanumerosevento/' + idSeleccionado,
                    type: 'GET',
                    success: function(data) {
                        $('#floatingNumero').empty();
                        $.each(data, function(key, value) {
                            $('#floatingNumero').append('<option value="' + value.id + '">' + value.numero + '</option>');
                        });
                    }
                });
            } else {
                $('#floatingNumero').empty();
                $('#floatingNumero').append('<option value="">Seleccione un valor de la primera lista</option>');
                $('#floatingValor').val('');
            }
        });
    });
</script>
@endsection