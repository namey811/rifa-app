@extends('layouts.app')


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
                        <p class="card-text">Fecha: {{$event->fecha}}</p>
                        <a href="{{route('home.listar-numeros', $event->id)}}" class="btn btn-primary btn-sm" >Ver Numeros</a>
                      </div>
                    </div>
                   
                  </div>
                </div><!-- End Card with an image on left -->
                @endforeach
      </div>
    </div>
  </section>
    
@endsection