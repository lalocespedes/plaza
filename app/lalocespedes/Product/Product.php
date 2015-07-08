<?php

namespace lalocespedes\Product;

use lalocespedes\Category\Category;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
* 
*/
class Product extends Eloquent
{
	protected $table = 'products';

	protected $fillable = [
		'sku',
		'name',
		'description',
		'excerpt',
		'weight'
	];

	public function category() {

    	return $this->belongsTo('lalocespedes\Category\Category');
	}

}
