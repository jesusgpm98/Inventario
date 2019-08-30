<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamano extends Model
{
  protected $fillable = ['nombre'];

  protected $table = 'tamanos';

  public function productos(){
    return $this->hasMany(Producto::class);
  }
}
