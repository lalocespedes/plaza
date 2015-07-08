<?php

$app->get('/cart/show', function() use($app) {

	if ($app->cart->totalItems()) {
		
		echo "Cart ";
		var_dump($app->cart->all());

	} else {

		echo "Cart empty";
	}
	
});
