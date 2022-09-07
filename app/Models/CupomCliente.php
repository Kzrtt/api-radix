<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CupomCliente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idCupomCliente';
    protected $table = 'tblCupomCliente';
    protected $fillable = ['idCliente', 'idCupom', 'usado'];
}
