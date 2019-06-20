<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{
    protected $table = 'spending';
    protected $fillable = ['title', 'sum', 'category_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\CategorySpend');
    }
}
