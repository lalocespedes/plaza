<?php

$app->get('/cart/clear', function() use($app) {

	$app->cart->clear();

	echo "Cart cleaned";

});

