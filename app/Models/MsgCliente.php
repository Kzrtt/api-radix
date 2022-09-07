<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsgCliente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idMsgCliente';
    protected $table = 'tblMsg_cliente';
    protected $fillable = ['mensagem', 'data', 'idConversa'];
}
