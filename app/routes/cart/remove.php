<?php

$app->get('/cart/remove/:id', function($id) use($app) {

	$app->cart->remove($id);

	$app->response->redirect($app->urlFor('cart'));
	
})->name('cart.remove');
