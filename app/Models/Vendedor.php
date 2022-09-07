<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idVendedor';
    protected $table = 'tblVendedor';
    protected $fillable = ['nomeVendedor', 'cpfCnpj', 'emailVendedor', 'senhaVendedor', 'enderecoVendedor', 'fotoPerfil', 'selo', 'statusConta'];
}
