<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cumpom extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idCupom';
    protected $table = 'tblCupom';
    protected $fillable = ['nomeCupom', 'detalheCupom', 'idCliente'];
}
