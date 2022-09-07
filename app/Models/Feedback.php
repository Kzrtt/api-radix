<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idFeedback';
    protected $table = 'tblFeedback';
    protected $fillable = ['nome', 'feedback'];
}
