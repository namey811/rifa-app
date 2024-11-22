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
                <h5 class="card-title">Administracion de eventos</h5>
                <a href="{{route('eventos.create')}}" class="btn btn-primary"><i class=" ri-add-circle-line"></i> Agregar</a>
                <a href="{{route('eventos.index')}}" class="btn btn-info"><i class=" ri-refresh-line"></i> Actualizar</a>
                <!-- Table with stripped rows -->
                <table class="table datatable responsive">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Cifras</th>
                      <th>Valor</th>
                      <th>Fecha Evento</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Fin</th>
                      <th>Responsable</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($eventosresponsable as $evento)
                    <tr>
                      <td>{{$evento->id}}</td>
                      <td>{{$evento->nombre}}</td>
                      <td>{{$evento->descripcion}}</td>
                      <td>{{$evento->cifras}}</td>
                      <td>{{$evento->valor}}</td>
                      <td>{{$evento->fecha_evento}}</td>
                      <td>{{$evento->fecha_inicio}}</td>
                      <td>{{$evento->fecha_fin}}</td>
                      <td>{{$evento->responsables->nombre}} {{$evento->responsables->apellido}}</td>
                        <td>
                          <a href="{{route('eventos.show', $evento->id)}}" class="btn btn-light btn-sm"><i class="ri-tv-2-line"></i></a>
                          <a href="{{route('eventos.edit', $evento->id)}}" class="btn btn-info btn-sm"><i class="ri-edit-2-line"></i></a>
                          <form action="{{route('eventos.destroy', $evento->id)}}" method="POST" onsubmit="return confirm('Esta seguro de eliminar este registro ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="ri-delete-bin-5-line"></i></button>
                          </form>
                        </td>
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