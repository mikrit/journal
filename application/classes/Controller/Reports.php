<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Reports extends Controller_Base
{
	public function action_index()
	{
		$numbers = ORM::factory('number');
		$view = View::factory('reports/index');

		$errors = array();
		$data['to'] = time();
		$data['from'] = time();
		$data['status_id'] = 0;

		$id_numbers = array();
		$id_statuses = array();
		$find_array = array();

		$statuses = Helper::get_list_orm('status', 'status');
		$statuses[0] = '-';
		ksort($statuses);

		$analyzes = Helper::get_list_orm('analysis', 'title');

		if ($_POST)
		{
			$data = $_POST;

			$a = explode("-", $_POST['to']);
			if($a[0] != ''){
				$_POST['to'] = mktime(0,0,0,$a[1],$a[2],$a[0]);
			}else{
				$_POST['to'] = null;
			}

			$a = explode("-", $_POST['from']);
			if($a[0] != ''){
				$_POST['from'] = mktime(23,59,59,$a[1],$a[2],$a[0]);
			}else{
				$_POST['from'] = null;
			}

			if($_POST['to'] == null || $_POST['from'] == null)
			{
				$errors = array(0 => 'Одна из дат не заполнена');
			}
			else
			{
				foreach($analyzes as $k => $v)
				{
					if(isset($data['analysis_'.$k]))
					{
						$analiz = ORM::factory('analysis', $k);

						$numbs = $analiz->numbers->find_all();

						foreach($numbs as $numb)
						{
							$id_numbers[$numb->id] = 1;
						}
					}
				}

				$numbers = $numbers->and_where('date_add', '>=', $_POST['to'])->and_where('date_add', '<=', $_POST['from'])->find_all();

				if($data['status_id'] != 0)
				{
					foreach($numbers as $number)
					{
						$statuses2 = DB::select('number_id')
							->from('analyzes_numbers')
							->where('number_id', '=', $number->id)
							->and_where('status_id', '=', $data['status_id'])
							->as_object()
							->execute();

						foreach($statuses2 as $status)
						{
							$id_statuses[$status->number_id] = 1;
						}

					}
				}

				if(count($id_numbers) == 0)
				{
					$find_array = $id_statuses;
				}
				elseif(count($id_statuses) == 0)
				{
					$find_array = $id_numbers;
				}
				else
				{
					$find_array = array_intersect_assoc($id_numbers, $id_statuses);
				}
			}
		}

		foreach($analyzes as $k => $v)
		{
			if(!isset($data['analysis_'.$k]))
			{
				$data['analysis_'.$k] = 0;
			}
		}

		$view->data = $data;
		$view->errors = $errors;
		$view->statuses = $statuses;
		$view->analyzes = $analyzes;
		$view->find_array = $find_array;
		$view->numbers = $numbers;

		$this->template->content = $view->render();
	}
}