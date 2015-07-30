<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Year extends ORM
{
	public static function validation_year($values)
	{
		return Validation::factory($values);
	}
}