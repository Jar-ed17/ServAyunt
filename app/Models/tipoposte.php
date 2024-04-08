<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoposte extends Model
{
    use HasFactory;
    protected $table = 'tipoposte';
    protected $primaryKey = 'id_poste';
}
