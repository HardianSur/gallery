<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = ['id'];

    public function users(){
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
