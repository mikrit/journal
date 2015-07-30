<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Patient extends ORM
{
	protected $_has_many = array(
		'numbers'    => array(
			'model'       => 'number',
			'foreign_key' => 'patient_id',
		)
	);

    public static function validation_patient($values)
    {
        return Validation::factory($values)
        	->rule('fio', 'not_empty');
    }
}