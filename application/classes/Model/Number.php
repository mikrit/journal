<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Number extends ORM
{
	protected $_has_many = array(
		'analyzes' => array(
			'model'			=> 'analysis',
			'through'		=> 'analyzes_numbers',
			'foreign_key'	=> 'number_id',
		),
        'statuses' => array(
            'model'			=> 'status',
            'through'		=> 'analyzes_numbers',
            'foreign_key'	=> 'number_id',
        ),
	);

	protected $_belongs_to = array(
		'patient'	=> array(
			'model'			=> 'patient',
			'foreign_key'	=> 'patient_id',
		),
		'status'	=> array(
			'model'			=> 'status',
			'foreign_key'	=> 'status_id',
		),
		'method'	=> array(
			'model'			=> 'method',
			'foreign_key'	=> 'method_id',
		),
		'user1'		=> array(
			'model'			=> 'user',
			'foreign_key'	=> 'user1_id',
		),
		'user2'		=> array(
			'model'			=> 'user',
			'foreign_key'	=> 'user2_id',
		),
		'user3'		=> array(
			'model'			=> 'user',
			'foreign_key'	=> 'user3_id',
		),
	);

	public static function validation_number($values)
    {
        return Validation::factory($values)
			->rule('number_a', 'not_empty')
			->rule('material_number', 'max_length', array(':value', 30));
    }
}