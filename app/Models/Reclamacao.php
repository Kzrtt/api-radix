<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamacao extends Model
{
    use HasFactory;
    protected $table = 'tblReclamacao';
    protected $fillable = ['motivo', 'idCliente', 'idVendedor'];
}
