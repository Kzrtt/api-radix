<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idCliente';
    protected $table = 'tblCliente';
    protected $fillable = ['nomeCliente', 'cpfCliente', 'emailCliente', 'senhaCliente','statusCliente'];
}
