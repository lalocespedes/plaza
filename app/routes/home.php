<?php

$app->get('/', function() use ($app) {

	echo "Home".'<br>';

	var_dump($_SESSION).'<br>';

	if($app->auth) {

		dd($app->auth->username);

	}

});

$app->get('/:category', function($category) use($app) {

	$category = $app->category->with('products')->where('name', '=', $category)->first();


	if (!$category) {
		
		echo "No existe cagetory";
		$app->stop();

	}

	$count = $category->products->count();

	$response = [
		'data'	=> $category->toArray(),
		'total'	=> $count
	];

	echoRespnse(200, $response);

});


// $app->get('/:category/:id', function($category, $id) use($app) {

// 	$category_id =  $app->category->where('name', $category)->first()->id;

// 	$product =$app->product
// 				->where('category_id', $category_id)
// 				->where('id', $id)
// 				->get();

// 	dd($product);

// });

$app->get('/getProduct/:id', function($id) use($app) {

	$product = $app->product->with('category');

	$product->where("id", $id);

	$data = [ 
		'product' => $product->firstOrFail()
	];

	dd($data);

});

$app->get('/getListproducts/:category', function($category) use($app) {

	$products = $app->product->with('category');

	if ($category) {
    	$products->where("category_id", $category);
    }

    $data = $products->paginate(1);

	dd($data);

});
