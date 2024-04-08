<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transformador extends Model
{
    use HasFactory;
    protected $table = 'transformador';
    protected $primaryKey = 'id_transormador';
}
