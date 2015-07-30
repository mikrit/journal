<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Method extends ORM
{
	protected $_has_many = array(
		'numbers'  => array(
			'model'       => 'number',
			'foreign_key' => 'method_id',
		)
	);

	public static function validation_method($values)
	{
		return Validation::factory($values)
			->rule('title', 'not_empty');
	}
}