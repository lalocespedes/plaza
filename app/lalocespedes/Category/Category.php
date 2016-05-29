<?php

namespace lalocespedes\Category;

use lalocespedes\Product\Product;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model as Eloquent;
/**
* 
*/
class Category extends Eloquent
{
	
	protected $table = 'categories';

	protected $fillable = [
		'name',
		'description',
		'slug'
	];

	protected $attributes = [
		'enable' => true,
		'sequence'	=> 1
	];

	public function products()
	{
		return $this->hasMany('lalocespedes\Product\Product');
	}

	public function slug($value)
	{
		$slug = Str::slug($value);

		$count = Category::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

    	return $count ? "{$slug}-{$count}" : $slug;
	}

}
