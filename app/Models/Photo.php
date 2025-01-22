<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function like(){
        return $this->hasMany(Like::class, 'photo_id', 'id');
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'photo_id', 'id');
    }
}
