@extends('layouts.app')


@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
                      <!-- Card with header and footer -->
          <div class="card">
            <div class="card-header">Detalle Evento</div>
            <div class="card-body">
              <h5 class="card-title">{{$evento->nombre}}</h5>
              <h4 class="card-title">{{$evento->descripcion}}</h4>
              <p>Cifras: {{$evento->cifras}}</p>
              <p>Valor Boleto: {{$evento->valor}}</p>
              <p>Fecha: {{$evento->fecha_evento}}</p>
              <p>Responsable: {{$evento->responsables->nombre}} {{$evento->responsables->apellido}}</p>
            </div>
            <div class="card-footer">
                <a href="{{route('eventos.index')}}" class="btn btn-info">
                    <i class=" ri-arrow-go-back-line"></i> Atras</a>
            </div>
          </div><!-- End Card with header and footer -->

        </div>
  </section>
    
@endsection