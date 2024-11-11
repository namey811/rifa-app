@extends('layouts.app')


@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
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
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cliente</th>
                      <th>Evento</th>
                      <th>Numero</th>
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