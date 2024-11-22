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
                <h5 class="card-title">Administracion de pagos</h5>
                <a href="{{route('pagos.create')}}" class="btn btn-primary"><i class=" ri-add-circle-line"></i> Agregar</a>
                <a href="{{route('pagos.index')}}" class="btn btn-info"><i class=" ri-refresh-line"></i> Actualizar</a>
                <!-- Table with stripped rows -->
                <table class="table datatable responsive">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Clientes</th>
                      <th>Venta</th>
                      <th>Tipo</th>
                      <th>Metodo</th>
                      <th>Monto</th>
                      <th>Fecha</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pagosventas as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->clientes->nombre}} {{$item->clientes->apellido}}</td>
                      <td>{{$item->ventas->id}}</td>
                      <td>{{$item->tipo}}</td>
                      <td>{{$item->metodo_pago}}</td>
                      <td>{{$item->monto}}</td>
                      <td>{{$item->fecha_pago}}</td>
                        <td>
                          <a href="{{route('pagos.show', $item->id)}}" class="btn btn-light btn-sm"><i class="ri-tv-2-line"></i></a>
                          <a href="{{route('pagos.edit', $item->id)}}" class="btn btn-info btn-sm"><i class="ri-edit-2-line"></i></a>
                          <form action="{{route('pagos.destroy', $item->id)}}" method="POST" onsubmit="return confirm('Esta seguro de eliminar este registro ?')">
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