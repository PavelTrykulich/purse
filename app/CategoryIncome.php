<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryIncome extends Model
{
    protected $table = 'category_incoming';
    protected $fillable = ['title'];

    public function incoming()
    {
        return $this->hasOne('App\Income');
    }


}
