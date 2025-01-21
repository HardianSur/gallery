<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasUuids;
    protected $keyType = 'string';
public $incrementing = false;
    protected $fillable = [
        'title',
        'user_id',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
