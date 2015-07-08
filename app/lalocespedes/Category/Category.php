<?php

namespace lalocespedes\Category;

use lalocespedes\Product\Product;

use Illuminate\Database\Eloquent\Model as Eloquent;
/**
* 
*/
class Category extends Eloquent
{
	
	protected $table = 'categories';

	protected $fillable = [
		'name',
		'description'
	];

	protected $attributes = [
		'enable' => true,
		'sequence'	=> 1
	];

	public function products()
	{
		return $this->hasMany('lalocespedes\Product\Product');
	}

}
