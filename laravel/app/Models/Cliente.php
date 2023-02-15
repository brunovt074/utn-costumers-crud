<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'nro_cliente';       
    public $timestamps = false;    
    public $guarded = 'nro_cliente';

    function nombreCompleto(){

        return "$this->apellido $this->nombre";

    }

}
