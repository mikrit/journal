<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Kohana_Helper {

	public static function get_list_orm($table, $column){
		$datas = array();
		$orm = ORM::factory($table)->find_all();

		foreach($orm as $val){
			$datas[$val->id] = $val->$column;
		}

		return $datas;
	}
}