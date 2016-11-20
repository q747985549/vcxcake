<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	public $timestamps = false;
    public $table = "cart";
    protected $fillable = ['uid','cake_id','cake_title','price','weight','num'];
}
