<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'ingredientes', 'precio', 'cantidad', 'total', 'fecha_pedido', 'hora_pedido', 'tamano_id', 'tipoPan_id'];

    protected $table = 'productos';

    public function tamano(){
      return $this->belongsTo(Tamano::class);
    }

    public function tipo_pan(){
      return $this->belongsTo(TipoPan::class);
    }
}
