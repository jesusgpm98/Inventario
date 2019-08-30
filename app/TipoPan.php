<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPan extends Model
{
  protected $fillable = ['nombre'];

  protected $table = 'tipos_panes';

  public function productos(){
    return $this->hasMany(Producto::class);
  }
}
