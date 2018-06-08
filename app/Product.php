<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='roba';
    protected $primaryKey = 'sifra_proizvoda';
    public $timestamps = false;
}
