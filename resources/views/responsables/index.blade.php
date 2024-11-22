@extends('layouts.app')

@section('css-customize')
<link href="{{ asset('templates/niceadmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{ asset('templates/niceadmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
@endsection

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
                <h5 class="card-title">Administracion de responsables</h5>
                <a href="{{route('responsables.create')}}" class="btn btn-primary"><i class=" ri-add-circle-line"></i> Agregar</a>
                <a href="{{route('responsables.index')}}" class="btn btn-info"><i class=" ri-refresh-line"></i> Actualizar</a>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>Cedula</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Direccion</th>
                      <th>Telefono</th>
                      <th>Email</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($responsables as $responsable)
                    <tr>
                      <td>{{$responsable->cedula}}</td>
                      <td>{{$responsable->nombre}}</td>
                      <td>{{$responsable->apellido}}</td>
                      <td>{{$responsable->direccion}}</td>
                      <td>{{$responsable->telefono}}</td>
                      <td>{{$responsable->email}}</td>
                      <td>
                      @if ($responsable->estado == "Activo")
                      <span class="badge bg-success"><i class="ri-check-line"></i></span>
                      @else 
                      <span class="badge bg-danger"><i class="ri-close-fill"></i></span>
                      @endif
                    </td>
                        <td>
                          <a href="{{route('responsables.show', $responsable->id)}}" class="btn btn-light btn-sm"><i class="ri-tv-2-line"></i></a>
                          <a href="{{route('responsables.edit', $responsable->id)}}" class="btn btn-info btn-sm"><i class="ri-edit-2-line"></i></a>
                          <form action="{{route('responsables.destroy', $responsable->id)}}" method="POST" onsubmit="return confirm('Esta seguro de eliminar este registro ?')">
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