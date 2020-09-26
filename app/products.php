<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table="products";
    public $timestamps=false;
    protected $fillable=['p_name','cat_id','price','image','status','desc'];
}
