<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeptModel extends Model
{
    protected $table = 'tb_departement';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
     
    protected $fillable = [
     'id',
     'dept',
    ];
}
