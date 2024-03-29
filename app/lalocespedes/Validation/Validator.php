<?php

namespace lalocespedes\Validation;

use Violin\Violin;

use lalocespedes\User\User;
use lalocespedes\Product\Product;
use lalocespedes\Helpers\Hash;

/**
* 
*/
class Validator extends Violin
{
	protected $user;

	protected $hash;

	protected $auth;

	protected $product;

	public function __construct(User $user, Hash $hash, $auth = null, Product $product)
	{
		$this->user = $user;
		$this->hash = $hash;
		$this->auth = $auth;
		$this->product = $product;

		$this->addFieldMessages([
			'email' => [
				'uniqueEmail' => 'That email is already in use'
			],
			'username' => [
				'uniqueUsername' => 'That username is already in use'
			],
			'sku' => [
				'uniqueSku' => 'That sku is already in use'
			]
		]);

		$this->addRuleMessages([
			'matchesCurrentPassword' => 'Contrasena actual invalida'
		]);
	}

	public function validate_uniqueEmail($value, $input, $args)
	{
		$user = $this->user->where('email', $value);

		return ! (bool) $user->count();
	}

	public function validate_uniqueUsername($value, $input, $args)
	{
		return ! (bool) $this->user->where('username', $value)->count();
	}

	public function validate_matchesCurrentPassword($value, $input, $args)
	{
		if ($this->auth && $this->hash->passwordCheck($value, $this->auth->password)) {
			return true;
		}

		return false;
	}

	public function validate_uniqueSku($value, $input, $args)
	{
		return ! (bool) $this->product->where('sku', $value)->count();
	}
}