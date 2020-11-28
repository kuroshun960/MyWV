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
    
    //このアーティストが所有するタグ
    
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('tags');
    }
    
}
