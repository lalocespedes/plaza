<?php

$app->get('/admin/products', $admin(), function() use($app) {

	$products = $app->product->get();

	echoRespnse(200, $products);

});