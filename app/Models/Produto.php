<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idProduto';
    protected $table = 'tblProduto';
    protected $fillable = ['nomeProduto', 'imagemProduto', 'detalheProduto', 'preco', 'statusProduto', 'idVendedor'];
}
