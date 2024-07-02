<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $primaryKey = 'id';
    
    use HasFactory;

    protected $fillable = ["medico_id","paciente_id","fecha","hora"];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function medico(){
        return $this->belongsTo(Medico::class);
    }
}
