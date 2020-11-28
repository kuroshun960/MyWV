<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    
    
    //このタグを所有するアーティスト
    
    protected $fillable = ['name'];
    
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
    
}
