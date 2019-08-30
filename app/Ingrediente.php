<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
  protected $fillable = ['nombre'];

  protected $table = 'ingredientes';
}
