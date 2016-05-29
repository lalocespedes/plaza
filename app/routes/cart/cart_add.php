<?php

$app->post('/cart/add/:id', function($id) use($app) {

	$product = $app->product->where('id', $id)->first();

	$itemData = [

		'name'			=> $product->name,
		'description'	=> $product->description,
		'sku'			=> $product->sku,
		'price'			=> (float)$product->price_1

	];

	$app->cart->insert($itemData);

	$app->response->redirect($app->urlFor('cart'));

})->name('cart.add');
