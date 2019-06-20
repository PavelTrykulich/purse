<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incoming';
    protected $fillable = ['title', 'sum', 'category_id','user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\CategoryIncome');
    }


}
