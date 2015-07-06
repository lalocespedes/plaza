<?php

$app->post('/admin/products/save', $admin(), function() use($app) {

	$request = $app->request();

	$sku = $request->post('sku');
	$name = $request->post('name');

	$v = $app->validation;

	$v->validate([

		'sku'	=> [$sku, 'required|uniqueSku'],
		'name'	=> [$name, 'required']

	]);

	if($v->passes()) {

		$product = $app->product->create([
			'sku' => $sku,
			'name' => $name
		]);

	} else {

		dd($v->errors());

	}

});