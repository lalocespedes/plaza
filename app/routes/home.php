<?php

$app->get('/', function() use ($app) {

	// echo "Home".'<br>';

	// var_dump($_SESSION).'<br>';

	// if($app->auth) {

	// 	dd($app->auth->username);

	// }

	$categories = $app->category->all();

	$app->render('/home/home.twig', [
		'title'			=> 'Home',
		'categories'	=> $categories
	]);

})->name('home');


$app->get('/category/:slug', function($slug) use($app) {


	if (!$slug) {

		$app->response->redirect('home');
	}

	$category = $app->category->with('products')->where('slug', '=', $slug)->first();

	if (!$category) {


		//flash 'no existe categoria'
		$app->response->redirect($app->urlFor('home'));

	}

	$count = $category->products->count();

	if ($count == 0) {
		
		//flash 'Categoria sin articulos'
		$app->response->redirect('home');

	}

	$app->render('front/category/category.twig', [

		'category'	=> $category->toArray(),
		'total'		=> $count
	]);

})->name('category');


// $app->get('/:category/:id', function($category, $id) use($app) {

// 	$category_id =  $app->category->where('name', $category)->first()->id;

// 	$product =$app->product
// 				->where('category_id', $category_id)
// 				->where('id', $id)
// 				->get();

// 	dd($product);

// });

$app->get('/getProduct/:slug', function($slug) use($app) {

	$product = $app->product->with('category');

	$product->where("slug", $slug);

	$app->render('/front/product/product.twig', [

		'product' => $product->firstOrFail()
	]);

})->name('getProduct');

$app->get('/getListproducts/:category', function($category) use($app) {

	$products = $app->product->with('category');

	if ($category) {
    	$products->where("category_id", $category);
    }

    $data = $products->paginate(1);

	dd($data);

});
