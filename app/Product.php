<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    //public $timestamps = false;
    
    protected $fillable = [
        'name', 'price', 'quantity', 'category', 'user_id', 'subcategory'
    ];
}