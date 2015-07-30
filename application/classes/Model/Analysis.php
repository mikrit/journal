<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Analysis extends ORM
{   
    protected $_has_many = array(
		'numbers'  => array(
			'model'       => 'number',
			'through' => 'analyzes_numbers',
			'foreign_key' => 'analysis_id',
		),
		'statuses'  => array(
			'model'       => 'status',
			'foreign_key' => 'analysis_id',
		)
    );

    public static function validation_analysis($values)
    {
        return Validation::factory($values)
			->rule('title', 'not_empty');
    }
}