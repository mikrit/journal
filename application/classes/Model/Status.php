<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Status extends ORM
{
	protected $_belongs_to = array(
		'analysis'	=> array(
			'model'			=> 'analysis',
			'foreign_key'	=> 'analysis_id',
		),
	);

    protected $_has_many = array(
        'numbers'  => array(
            'model'       => 'number',
            'through' => 'analyzes_numbers',
            'foreign_key' => 'status_id',
        )
    );

    public static function validation_status($values)
    {
        return Validation::factory($values)
			->rule('status', 'not_empty');
    }
}