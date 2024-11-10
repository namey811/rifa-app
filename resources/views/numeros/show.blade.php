@extends('layouts.app')


@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
                      <!-- Card with header and footer -->
          <div class="card">
            <div class="card-header">Detalle numero</div>
            <div class="card-body">
              <h5 class="card-title">{{$numero->numero}}</h5>
              <p>Estado: {{$numero->estado}}</p>
              <p>Evento: {{$numero->eventos->nombre}}</p>
            </div>
            <div class="card-footer">
                <a href="{{route('numeros.index')}}" class="btn btn-info">
                    <i class=" ri-arrow-go-back-line"></i> Atras</a>
            </div>
          </div><!-- End Card with header and footer -->

        </div>
  </section>
    
@endsection