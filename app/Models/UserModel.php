<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
     
    protected $fillable = [
     'id',
     'nama',
     'nik',
     'tanggal',
     'role',
     'dept',
     'email',
     'no_hp',
     'password',
     'gambar'
    ];

    public function role()
    {
        return $this->belongsTo(
            RoleModel::class,
            'role',
            'id'  
        );
    }

    public function dept()
    {
        return $this->belongsTo(
            DeptModel::class,
            'dept',
            'id'
        );
    }
}
