<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'tb_role';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
     
    protected $fillable = [
     'id',
     'role',
    ];

    public function role()
    {
        return $this->hasMany(
            UserModel::class,
            'role',
            'id'  
        );
    }
}
