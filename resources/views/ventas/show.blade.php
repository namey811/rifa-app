@extends('layouts.app')

@section('css-customize')
<link href="{{ asset('templates/niceadmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
@endsection

@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
                      <!-- Card with header and footer -->
          <div class="card">
            <div class="card-header">Detalle Venta Cliente</div>
            <div class="card-body">
              <h5 class="card-title">{{$numeroscliente->clientes->nombre}} {{$numeroscliente->clientes->apellido}}</h5>
              <p>Evento: {{$numeroscliente->eventos->nombre}}</p>
              <p>Descripcion: {{$numeroscliente->eventos->descripcion}}</p>
              <p>Fecha: {{$numeroscliente->eventos->fecha_evento}}</p>
              <p>Numeros: {{$numeroscliente->numeros->numero}}</p>
              <p>Estado: {{$numeroscliente->estado}}</p>
              @if($numeroscliente->estado == 'Pagado')
              <h5>Gracias por tu pago! Te deseamos exitos!!!</h5>
              @else
              <h5>Haz tu pago por transferencia</h5>
              <a href="{{ asset('templates/niceadmin/assets/img/QR.jpg')}}" download="QR ITCloud">
                <img class="img-thumbnail" src="{{ asset('templates/niceadmin/assets/img/QR.jpg')}}" alt="QR Pagos">
              </a>
              @endif
            </div>
            <div class="card-footer">
                <a href="{{route('ventas.index')}}" class="btn btn-info">
                    <i class=" ri-arrow-go-back-line"></i> Atras</a>
            </div>
          </div><!-- End Card with header and footer -->

        </div>
  </section>
    
@endsection