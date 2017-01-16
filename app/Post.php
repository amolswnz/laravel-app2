<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function tags() 
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function setTitleAttribute($value) 
    {
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value) 
    {
        $allWords = explode(" " ,$value);
        for($count=0;$count<sizeof($allWords);$count++) 
            $allWords[$count] = ucfirst($allWords[$count]);
        return implode($allWords, " ");
    }
}
