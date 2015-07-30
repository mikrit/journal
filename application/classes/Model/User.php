<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_User extends Model_Auth_User
{
	public static function validation_n($values)
	{
		return Validation::factory($values)
			->rule('username', 'not_empty')
			->rule('username', 'min_length', array(':value', 2))
			->rule('username', 'max_length', array(':value', 60))
			->rule('username', 'regex', array(':value', '/^[a-z0-9_.]++$/iD'))
	
			->rule('name', 'not_empty')
		 
			->rule('password', 'not_empty')
			->rule('password', 'min_length', array(':value', 6))
			
			->rule('password_confirm',  'matches', array(':validation', 'password_confirm', 'password'));
	}
	
	public static function validation_up1($values)
	{
		return Validation::factory($values)
			->rule('username', 'not_empty')
			->rule('username', 'min_length', array(':value', 2))
			->rule('username', 'max_length', array(':value', 60))
			->rule('username', 'regex', array(':value', '/^[a-z0-9_.]++$/iD'))
			
			->rule('name', 'not_empty');
	}
	
	public static function validation_prof($values)
	{
		return Validation::factory($values)
			->rule('name', 'not_empty');
	}
	
	public static function validation_up2($values)
	{
		return Validation::factory($values)
			->rule('password', 'not_empty')
			->rule('password', 'min_length', array(':value', 6))
			
			->rule('password_confirm',  'matches', array(':validation', 'password_confirm', 'password'));
	}
}
