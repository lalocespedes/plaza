<?php

$app->get('/', function() use ($app) {

	echo "Home".'<br>';

	var_dump($_SESSION).'<br>';

	if($app->auth) {

		dd($app->auth->username);

	}

});

$app->get('/:category', function($category) use($app) {

	$request = $app->request();

	//$users = $app->user->paginate(15);

	$perPage = 1;

	$page = 1;

	$start = ($page*$perPage)-$perPage;

	$category = $app->category->with('products')->where('name', '=', $category)->first();

	//dd($category);

	echo $category->name.'<br>';

	echo "<hr>";

	foreach ($category->products->take($perPage) as $key => $product) {
		
		echo $product->name.'<br>';
		echo $product->category->name.'<br>';

	}

	//echoRespnse(200, $categories->products());

});


$app->get('/:category/:id', function($category, $id) use($app) {

	$category_id =  $app->category->where('name', $category)->first()->id;

	$product =$app->product
				->where('category_id', $category_id)
				->where('id', $id)
				->get();

	dd($product);

});