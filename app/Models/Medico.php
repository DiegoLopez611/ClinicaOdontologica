<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $primaryKey = 'identificacion';
    use HasFactory;

    protected $fillable = ["identificacion","nombres","apellidos","telefono","correoElectronico"];

    public function citas(){
        return $this->hasmany(Cita::class);
    }
}
