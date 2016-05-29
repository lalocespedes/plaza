<?php

namespace lalocespedes\Product;

use lalocespedes\Category\Category;

use Illuminate\Support\Str;

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
		'weight',
		'slug'
	];

	public function category() {

    	return $this->belongsTo('lalocespedes\Category\Category');
	}

	public function slug($value)
	{
		$slug = Str::slug($value);

		$count = Product::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

    	return $count ? "{$slug}-{$count}" : $slug;
	}
}
