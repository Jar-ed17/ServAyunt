<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidas extends Model
{
    use HasFactory;

    protected $table = 'medidas';
    protected $primaryKey = 'id_medida';
    // public $timestamps = false;
    
}
