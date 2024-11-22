@extends('layouts.app')

@section('css-customize')
<link href="{{ asset('templates/niceadmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
@endsection

@section('content')

<section class="section">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <div class="row">
                <!-- Card with an image on left -->
                @if(!$eventos->isEmpty())
                @foreach($eventos as $event)
                <div class="card lg-6">
                  <div class="row g-4">
                    <div class="col-md-8">
                      <img src="{{ asset('templates/niceadmin/assets/img/event.png')}}" class="img-fluid rounded-start" alt="Logo rifa">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">{{$event->nombre}}</h5>
                        <p class="card-text">Descripcion: {{$event->descripcion}}</p>
                        <p class="card-text">Valor: {{$event->valor}}</p>
                        <p class="card-text">Fecha: {{$event->fecha_evento}}</p>
                        <a href="{{route('home.listar-numeros', $event->id)}}" class="btn btn-primary btn-sm" >Ver Numeros</a>
                      </div>
                    </div>
                  </div>
                </div><!-- End Card with an image on left -->
                @endforeach
                @else
                <h1 style="text-align: center">No hay eventos</h1>
                @endif
      </div>
    </div>
  </section>
    
@endsection