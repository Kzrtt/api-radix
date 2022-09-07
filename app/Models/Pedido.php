<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idPedido';
    protected $table = 'tblPedido';
    protected $fillable = ['data', 'frete', 'idCliente', 'idVendedor', 'idCupomCliente', 'idEntregador'];
}
