<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySpend extends Model
{
    protected $table = 'category_spending';
    protected $fillable = ['title'];

    public function spending()
    {
        return $this->hasOne('App\Spend');
    }
}
