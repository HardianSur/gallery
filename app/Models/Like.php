<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasUuids;
    protected $keyType = 'string';
public $incrementing = false;
    protected $guarded = ['id'];

    public function photo(){
        return $this->belongsTo(Photo::class,'photo_id', 'id');
    }
}
