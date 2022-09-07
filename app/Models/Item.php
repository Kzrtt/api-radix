<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idItem';
    protected $table = 'tblItem';
    protected $fillable = ['qntdItem', 'idProduto', 'idPedido'];
}
