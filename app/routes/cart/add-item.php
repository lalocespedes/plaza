<?php

$app->get('/cart/add-item', function() use($app) {

	$itemData = array(
		'name' => 'Macbook Pro',
		'sku' => 'MBP8GB',
		'price' => 1200,
		'tax' => 200,
			'options' => array(
			'ram' => '8 GB',
			'ssd' => '256 GB'
			)
		);

	$app->cart->insert($itemData);

	echo "Item added";

	echo "<br>";

	echo $app->cart->totalItems();

});
