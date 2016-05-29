<?php

$app->get('/products', function() use ($app) {

	$products = $app->product->get();

	dd($products);

});
