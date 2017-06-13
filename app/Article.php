<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
     	'user_id','category_id','content','published','user_name',
    ];

    
    public function setpublishedAttribute($value){
    	$this->attributes['published'] = (boolean)($value);
    }

	public function getShortContentAttribute(){
    	return substr($this->content, 0, random_int(30,60)).'...';	
    }

}

