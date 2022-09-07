<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clienteFavorito extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idVendedor';
    protected $table = 'tblVendedor';
    protected $fillable = ['idCliente', 'idVendedor', 'isFavorite'];
}
