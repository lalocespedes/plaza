<?php

$app->get('/admin/categories/add', function() use($app) {

	$app->render('/admin/categories/add.twig', [
		'title'	=> 'Agregar Categoria'
	]);

});

$app->post('/admin/categories/save', $admin(), function() use($app) {

	$request = $app->request();

	$name = $request->post('name');	
	$description = $request->post('description');

	$v = $app->validation;

	$v->validate([

		'name'	=> [$name, 'required'],
		'description'	=> [$description, 'required']

	]);

	if($v->passes()) {

		$category = $app->category->create([
			'name' => $name,
			'description' => $description
		]);

	} else {

		dd($v->errors());

	}

});
