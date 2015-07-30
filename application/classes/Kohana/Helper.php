<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Kohana_Helper {

	public static function get_list_orm($table, $col){
		$datas = array();
		$orm = ORM::factory($table)->find_all();

		foreach($orm as $val){
			$datas[$val->id] = $val->$col;
		}

		return $datas;
	}
}