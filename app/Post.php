<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = ['user_id','category_id','title','slug','image','description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
