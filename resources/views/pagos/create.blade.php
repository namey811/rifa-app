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
                <h5 class="card-title">Creacion de Pago</h5>

                <form action="{{ route('pagos.store') }}" method="POST" class="row g-3">
                    @csrf <!-- Protección contra CSRF -->
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelectCli" aria-label="Cliente" name="clientes_id" required>
                          <option value="">Seleccione..</option>
                          @foreach($clientes as $item)
                            <option value="{{$item->clientes->id}}">{{$item->clientes->nombre}} {{$item->clientes->apellido}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelectCli">Cliente:</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelectVenta" aria-label="Venta" name="ventas_id" required>
                          <option value="">Seleccione un cliente..</option>
                        </select>
                        <label for="floatingSelectVenta">Venta:</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelectTipo" aria-label="Tipo" name="tipo" required>
                          <option value="">Seleccione..</option>
                          <option value="Abono">Abono</option>
                          <option value="Total" selected>Total</option>
                        </select>
                        <label for="floatingSelectTipo">Tipo de pago:</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelectMetodo" aria-label="Tipo" name="metodo_pago" required>
                        <option value="">Seleccione..</option>
                        <option value="Efectivo" selected>Efectivo</option>
                        <option value="Transferencia">Transferencia</option>
                      </select>
                      <label for="floatingSelectMetodo">Metodo de pago:</label>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating">
                        <input type="number" class="form-control" id="floatingMonto" placeholder="Monto" name="monto" value="{{ old('monto') }}" required>
                        <label for="floatingMonto">Valor de pago:</label>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="date" class="form-control" id="floatingFechaP" placeholder="Fecha Pago" name="fecha_pago" value="{{ old('fecha_pago', date('Y-m-d')) }}" required>
                      <label for="floatingFechaP">Fecha Pago:</label>
                    </div>
                </div>
                
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="{{route('pagos.index')}}" class="btn btn-info">
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
        $('#floatingSelectCli').on('change', function() {
            var idSeleccionado = $(this).val();
            if (idSeleccionado) {
                $.ajax({
                    url: '/cargarventasporcliente/' + idSeleccionado,
                    type: 'GET',
                    success: function(data) {
                        $('#floatingSelectVenta').empty();
                        $.each(data, function(key, value) {
                            $('#floatingSelectVenta').append('<option value="' + value.id + '">Numero: ' + value.numeros.numero + ' | Valor: ' +value.saldo+ '</option>');
                            console.log(value.monto);
                            $('#floatingMonto').val(value.saldo);
                        });
                    }
                });
            } else {
                $('#floatingSelectVenta').empty();
                $('#floatingSelectVenta').append('<option value="">Seleccione un valor de la primera lista</option>');
                
            }
        });
    });
</script>
@endsection