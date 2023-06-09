<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestar extends Model
{
    use HasFactory;

    protected $table = 'prestar';
    protected $primaryKey = 'idprestar';
    protected $keyType = 'int';
    public $timestamps = false;
}
