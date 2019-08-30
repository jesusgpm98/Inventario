@extends('layout')

@section('title')

  @section('content')
    <div class="row">
      <br>

      <!-- INICIO MENSAJES -->
      @if(session('message_agregado'))
        <div class="col-md-3 offset-md-9">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message_agregado') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      @endif

      @if(session('message_eliminado'))
        <div class="col-md-3 offset-md-9">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('message_eliminado') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      @endif
      <!-- FIN MENSAJES -->

      <div class="col-md-9 offset-md-3">
        <br>

        <div class="col-md-8 offset-md-1">
          <h1 class="">Realizar Pedido</h1>
        </div>

        <br><br>

        <div class="col-md-7">
          @if ($errors->any())
            <div class="alert alert-danger">
              {{ $errors->first() }}
            </div>
          @endif
        </div>

        <form method="POST" action="{{ route('productos.store') }}">

          {{ csrf_field() }}

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="name">Nombre Pizza:</label>
              <input class="form-control" type="text" name="nombre" id="name" placeholder="" value="{{ old('nombre') }}">
            </div>
            <div class="form-group col-md-3 offset-md-1">
              <label for="tamano">Tamaño:</label>
              <select class="browser-default custom-select" name="tamano" id="tamano" onchange="calcularSuma();">
                <option value="" selected disabled>Seleccione</option>
                @foreach ($tamanos as $tamano)
                  <option value="{{ $tamano->id }}" data-precio="{{$tamano->precio}}">{{ $tamano->nombre }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <br>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="masa">Masa:</label>
              <select class="browser-default custom-select" name="tipoPan" id="masa" onchange="calcularSuma();">
                <option value="" selected disabled>Seleccione</option>
                @foreach ($tipoPan as $masa)
                  <option value="{{ $masa->id }}" data-precio="{{ $masa->precio }}">{{ $masa->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3 offset-md-1">
              <label for="cantidad">Nro Pizzas:</label>
              <input class="form-control" type="number" name="cantidad" id="cantidad" placeholder="" value="{{ old('cantidad') }}">
            </div>
          </div>

          <label for="ingredientes">Ingredientes</label>
          <div class="form-row">
            <select class="ingredientes" id="ingredientes" name="ingredientes[]" multiple="multiple" style="width: 58%">
              @foreach ($ingredientes as $ingrediente)
                <option value="{{ $ingrediente->nombre }}">{{ $ingrediente->nombre }}</option>
              @endforeach
            </select>
          </div>

          <br>

          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="precio">Total:</label>
              <input class="form-control" type="text" name="total" id="total" readonly>
            </div>
          </div>

          <br>
          <div class="col-7">
            <button type="submit" class="btn btn-danger btn-block">Agregar</button>
          </div>
        </form>

        <br><br>

      </div>

      <div class="col-md-12 offset-md-0">
        <hr>
        @if($productos->isEmpty())
        @else
          <h1 class="text-center">Órdenes</h1><br>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">Fecha Pedido</th>
                <th scope="col">Hora Pedido</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tamaño</th>
                <th scope="col">Masa</th>
                <th scope="col">Ingredientes</th>
                <th scope="col">Valor</th>
                <th scope="col">Número de Pizzas</th>
                <th scope="col">Total</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($productos as $producto)
                <tr>
                  <td>{{ $producto->fecha_pedido }}</td>
                  <td>{{ $producto->hora_pedido }}</td>
                  <td>{{ $producto->nombre }}</td>
                  <td>{{ $producto->tamano->nombre }}</td>
                  <td>{{ $producto->nombre_panes }}</td>
                  <td>{{ $producto->ingredientes }}</td>
                  <td>${{ $producto->precio }}</td>
                  <td>{{ $producto->cantidad }}</td>
                  <td>${{ $producto->total }}</td>
                  <td>
                    <form class="" action="{{ route('productos.destroy', $producto) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" title="Eliminar" class="btn btn-link">Eliminar</button>
                    </form>
                  </td>
                </tr>
              @empty

              @endforelse
            </tbody>
          </table>
        @endif
      </div>
    </div>
  @endsection


  {{-- <div class="col-4 col-md-3">
  <div class="card">
  <div class="card-header">
  <div class="card-title">
  <h4>Bienvenid@ {{ auth()->user()->name }}</h4>
</div>
</div>
<div class="card-body">
<form action="{{ route('user.logout') }}" method="POST">
{{ csrf_field() }}
<div class="div-col-md-10 offset-md-2">
<button type="submit" name="button" class="btn btn-danger">Cerrar Sesión</button>
</div>
</form>
</div>
</div>
</div> --}}
