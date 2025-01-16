<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
