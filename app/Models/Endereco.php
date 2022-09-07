<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idEndereco';
    protected $table = 'tblEndereco';
    protected $fillable = ['apelidoEndereco', 'endereco', 'complemento', 'numero','statusEndereco', 'idCliente'];
}