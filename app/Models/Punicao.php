<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punicao extends Model
{
    use HasFactory;
    protected $table = 'tblPunicao';
    protected $fillable = ['tipo', 'motivo', 'assunto', 'idVendedor'];
}
