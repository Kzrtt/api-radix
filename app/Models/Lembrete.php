<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembrete extends Model
{
    use HasFactory;
    protected $table = 'tblLembrete';
    protected $fillable = ['titulo', 'requisitados', 'idAdm'];
}
