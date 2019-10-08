<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Post extends Model implements ViewableContract
{
    use Viewable;
    
    protected $fillable = [
        'user_id','category_id','photo_id','area_id','name','review','detail','url'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function area(){
        return $this->belongsTo('App\Area');
    }
}
