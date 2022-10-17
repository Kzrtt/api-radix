<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblVendedorFav extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idVendedorFav';
    protected $table = 'tblVendedorFav';
    protected $fillable = ['idCliente', 'idVendedor', 'isFavorite'];
}
