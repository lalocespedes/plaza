<?php

$app->get('/cart', function() use($app) {

	if ($app->cart->totalItems()) {

		$app->render('front/cart/cart.twig', [

			'cart'			=> $app->cart->all(),
			'total'			=> $app->cart->total(),
			'total_items'	=> $app->cart->totalUniqueItems()

		]);

	} else {

		echo "Cart empty";
	}
	
})->name('cart');
