@extends('layouts.app')

@section('css-customize')
<link href="{{ asset('templates/niceadmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{ asset('templates/niceadmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
@endsection

@section('content')

<section class="section">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-8 col-lg-12">
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Administracion de ventas</h5>
                <a href="{{route('ventas.create')}}" class="btn btn-primary"><i class=" ri-add-circle-line"></i> Agregar</a>
                <a href="{{route('ventas.index')}}" class="btn btn-info"><i class=" ri-refresh-line"></i> Actualizar</a>
                <!-- Table with stripped rows -->
                <table class="table datatable responsive">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cliente</th>
                      <th>Evento</th>
                      <th>Numero</th>
                      <th>Saldo</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($clientesventas as $ventas)
                    <tr>
                      <td>{{$ventas->id}}</td>
                      <td>{{$ventas->clientes->nombre}} {{$ventas->clientes->apellido}}</td>
                      <td>{{$ventas->eventos->nombre}}</td>
                      <td>{{$ventas->numeros->numero}}</td>
                      <td>{{$ventas->saldo}}</td>
                      <td>

                        @if($ventas->estado == 'Pagado')
                            <p>
                              <span class="badge bg-success me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$ventas->estado}}">
                                <i class="bi bi-check-circle me-1"></i>
                              </span>
                            </p>
                        @else
                            <span class="badge bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$ventas->estado}}">
                              <i class="bi bi-exclamation-octagon me-1"></i>
                            </span>
                        @endif
                      </td>
                        <td>
                          <a href="{{route('ventas.show', $ventas->id)}}" class="btn btn-light btn-sm"><i class="ri-tv-2-line"></i></a>
                          <a href="{{route('ventas.edit', $ventas->id)}}" class="btn btn-info btn-sm"><i class="ri-edit-2-line"></i></a>
                          <form action="{{route('ventas.destroy', $ventas->id)}}" method="POST" onsubmit="return confirm('Esta seguro de eliminar este registro ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="ri-delete-bin-5-line"></i></button>
                          </form>
                        </td>
                    </tr>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>
    </div>
  </section>
    
@endsection

@section('js-customize')
<script src="{{ asset('templates/niceadmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
@endsection