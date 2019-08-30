@extends('layout')

@section('title')

  @section('content')

    <div class="row">
      <br>
      <div class="col-md-10 offset-md-1">
        <div class="card">
          <div class="card-body">
            <div class="row">

            @if ($productos->isEmpty())
            @else
              <div class="col-md-3 col-xs-6 text-center">
                <div style="text-decoration: underline; padding-bottom: 4px;">
                  <strong>Resumen</strong>
                </div>
                <div>
                  Total Pagado: <strong>${{ $total }}</strong>
                </div>
                <div>
                  Pagos Realizados: <strong>{{ $cantidad }}</strong>
                </div>
              </div>
            @endif
              <div class="col-md-5 offset-md-3 text-center">
                <div style="text-decoration: underline; padding-bottom: 4px;">
                  <strong>Rangos de Fechas</strong>
                </div>
                <div>
                  Desde: <strong>{{ $desde_parse }}</strong>
                </div>
                <div>
                  Hasta: <strong>{{ $hasta_parse }}</strong>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <br>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Fecha Pedido</th>
              <th scope="col">Nombre</th>
              <th scope="col">Tamaño</th>
              <th scope="col">Masa</th>
              <th scope="col">Valor</th>
              <th scope="col">Número de Pizzas</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($productos as $producto)
              <tr>
                <td>{{ \Carbon\Carbon::parse($producto->fecha_pedido)->format('m/d/Y') }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->tamano->nombre }}</td>
                <td>{{ $producto->nombre_panes }}</td>
                <td>${{ $producto->precio }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>${{ $producto->total }}</td>
              </tr>
            @empty
            </tbody>
            <tr>
              <td colspan="22">
                <div class="alert alert-warning">
                    No hay registros en los rangos de fechas indicados
                </div>
              </td>
            </tr>
          @endforelse
        </table>
      </div>

      <div class="col-md-1">
        <br><br>
        <a href="{{ route('productos.buscar') }}" class="btn btn-primary">Volver</a>
      </div>

    </div>

  @endsection
