<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Tamano;
use App\TipoPan;
use App\Ingrediente;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }


  public function index()
  {
    $title = 'Inicio';

    //seleccionar el tipo de pan
    $productos = Producto::select('productos.*', 'tipos_panes.nombre as nombre_panes')
    ->leftJoin('tipos_panes', 'productos.tipoPan_id', '=', 'tipos_panes.id')
    ->orderBy('fecha_pedido', 'ASC')
    ->get();

    $tamanos = Tamano::all();
    $tipoPan = TipoPan::all();
    $ingredientes = Ingrediente::all();


    return view('inicio.index', compact('title', 'productos', 'tamanos', 'tipoPan', 'ingredientes'));
  }

  public function create()
  {

  }

  public function store(Request $request)
  {
    $data = request()->validate([
      'nombre' => 'required',
      'tamano' => 'required',
      'tipoPan' => 'required',
      'cantidad' => 'required',
      'ingredientes' => 'required',
      'total' => ''
    ]);

    //se separa los ingredientes del arreglo por comas (,)
    $ingredientes = implode(',',$data['ingredientes']);

    //se le asigna formato a fecha y hora
    $date = Carbon::now();
    $fecha_pedido = $date->format('Y-m-d');
    $hora_pedido = $date->toTimeString();

    $precioFinal = $data['total'];
    $cantidad = $data['cantidad'];
    //se calcula total
    $total = $precioFinal * $cantidad;

    $jugador = Producto::create([
      'nombre' => $data['nombre'],
      'tamano_id' => $data['tamano'],
      'tipoPan_id' => $data['tipoPan'],
      'precio' => $data['total'],
      'cantidad' => $data['cantidad'],
      'ingredientes' => $ingredientes,
      'total' => $total,
      'fecha_pedido' => $fecha_pedido,
      'hora_pedido' => $hora_pedido
    ]);

    return redirect()->route('productos.index')
                     ->with('message_agregado', 'Pizza Agregada');
  }

  public function buscar(){
    $title = 'Busqueda Pagos';

    return view('listadoPagado.busqueda_pagos', compact('title'));
  }

  public function listar(Request $request){

    $datos = request()->validate([
      'desde' => 'required|date',
      'hasta' => 'required|date'
    ]);

    //se reciben los datos enviados y se guardan en variables
    $desde = $datos['desde'];
    $hasta = $datos['hasta'];

    //se obtiene los registros de acuerdo a fecha seleccionada
    $productos = Producto::select('productos.*', 'tipos_panes.nombre as nombre_panes')
    ->leftJoin('tipos_panes', 'productos.tipoPan_id', '=', 'tipos_panes.id')
    ->whereDate('fecha_pedido', '>=', $desde)
    ->whereDate('fecha_pedido', '<=', $hasta)
    ->orderBy('fecha_pedido', 'ASC')
    ->get();

    //se saca total de ventas
    $total = Producto::select('total')
                     ->whereDate('fecha_pedido', '>=', $desde)
                     ->whereDate('fecha_pedido', '<=', $hasta)
                     ->sum('total');

    //se saca la cantidad de ventas
    $cantidad = Producto::select('cantidad')
                        ->whereDate('fecha_pedido', '>=', $desde)
                        ->whereDate('fecha_pedido', '<=', $hasta)
                        ->count('*');

    $tamanos = Tamano::all();
    $tipoPan = TipoPan::all();

    //se parsean los datos de la fecha al formato seleccionado (solo para la vista)
    $desde_parse = Carbon::parse($desde)->format('m/d/Y');
    $hasta_parse = Carbon::parse($hasta)->format('m/d/Y');

    $title = 'listado Pagados';
    return view('listadoPagado.listado_pagados',
           compact('title', 'total', 'cantidad', 'productos', 'tamanos', 'tipoPan', 'desde_parse', 'hasta_parse'));
  }

  public function show()
  {

  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy(Producto $producto){
    $producto->delete();

    return redirect()->route('productos.index')
                     ->with('message_eliminado', 'Registro eliminado');
  }
}
