<?php

$app->get('/admin/categories/add', $admin(), function() use($app) {

	$app->render('/admin/categories/add.twig', [
		'title'	=> 'Agregar Categoria'
	]);

});

$app->post('/admin/categories/save', function() use($app) {

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
			'name' 			=> $name,
			'description' 	=> $description,
			'slug'			=> $app->category->slug($name)
		]);

	} else {

		dd($v->errors());

	}

});
