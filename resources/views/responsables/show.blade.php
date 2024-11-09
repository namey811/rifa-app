@extends('layouts.app')


@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
                      <!-- Card with header and footer -->
          <div class="card">
            <div class="card-header">Detalle Responsable</div>
            <div class="card-body">
              <h5 class="card-title">{{$responsable->cedula}}</h5>
              <h4 class="card-title">{{$responsable->nombre}} {{$responsable->apellido}}</h4>
              <p>Direccion: {{$responsable->direccion}}</p>
                  <p>{{$responsable->telefono}}</p>
                  <p>Correo: {{$responsable->email}}</p>
                  <p>Estado: @if ($responsable->estado == 1)
                    <span class="badge bg-success"><i class="ri-check-line"></i></span>
                    @else 
                    <span class="badge bg-danger"><i class="ri-close-fill"></i></span>
                    @endif</p>
            </div>
            <div class="card-footer">
                <a href="{{route('responsables.index')}}" class="btn btn-info">
                    <i class=" ri-arrow-go-back-line"></i> Atras</a>
            </div>
          </div><!-- End Card with header and footer -->

        </div>
  </section>
    
@endsection