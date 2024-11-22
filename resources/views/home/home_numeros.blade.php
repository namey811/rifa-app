@extends('layouts.app')

@section('css-customize')
<link href="{{ asset('templates/niceadmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
@endsection

@section('content')

<section class="section">
    <div class="row">
      @foreach ($numeros as $numero)
      <div class="col-lg-1">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$numero->numero}}</h5>
            @if($numero->estado == 'Disponible')
             <p>
              <span class="badge bg-success me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$numero->estado}}">
                <i class="bi bi-check-circle me-1"></i>
              </span>
            </p>
              <p>{{$numero->eventos->valor}}</p>
              <a href="{{route('home.venta-online', $numero->id)}}" class="btn btn-primary btn-sm" >Comprar</a>
              @else
              <span class="badge bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$numero->estado}}">
                <i class="bi bi-exclamation-octagon me-1"></i>
              </span>
            @endif
          </div>
        </div>

      </div>
      @endforeach

      </div>
    </div>
  </section>
    
@endsection