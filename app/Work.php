<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    
    //この作品を所有するアーティスト
    
    protected $fillable = ['name','title','description',];
    
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
    
}
