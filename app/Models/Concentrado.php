<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concentrado extends Model
{
    use HasFactory;

    // protected $primaryKey = '';

    protected $table = 'concentrado';
    
    // public $timestamps = false;

    protected $fillable = [
        'Sm_Av',
        'Latitud',
        'Longitud',
        'Posicion',
        'Circuito',
        'Etiqueta',
        'RPU',
        'Municipalizado',
        'Luminarias',
        'Id_medida_fk',                
        'Id_lampara_fk',
        'Id_potencia_fk',        
        'Id_poste_fk',
        'Id_dependencia_fk',
        'Id_altura_fk',
        'Id_estatus_fk',
        'Id_transformador_fk',
        'id_tipoLuminaria_fk',
        'Observaciones',
        'NumMedidor'
    ];
}
