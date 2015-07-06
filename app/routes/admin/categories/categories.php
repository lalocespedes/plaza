<?php

$app->get('/admin/categories', $admin(), function() use($app) {

	$categories = $app->category->get();

	echoRespnse(200, $categories);

});