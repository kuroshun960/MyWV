<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    
    protected $fillable = ['name','description','style',];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
