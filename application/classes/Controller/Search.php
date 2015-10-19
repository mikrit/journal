<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller_Base
{
	public function action_index()
	{
		$data['fio'] = '';
		$data['number_p'] = '';
		$data['number_a'] = '';
		$data['year'] = date('Y');

		$statuses = array(
			1 => 'Зарегистрирован, в ожидании обработки',
			2 => 'Материал на отборе',
			3 => 'В работе',
			4 => 'Готов',
			5 => 'Отказ пациента',
			6 => 'Отказ по состоянию материала',
			7 => 'Отправлен пациенту',
			8 => 'Повтор',
			9 => 'Особый случай',
			10 => 'Договор',
			11 => 'ДМС',
		);

		$count = ORM::factory('number')->select(array('patients.id', 'pid'), array('patients.fio', 'fio'));
		$numbers = ORM::factory('number')->select(array('patients.id', 'pid'), array('patients.fio', 'fio'));

		if($_GET)
		{
			foreach($data as $key => $val)
			{
				if(isset($_GET[$key]))
				{
					$data[$key] = $_GET[$key];
				}
			}

			if(isset($data['number_p']) && $data['number_p'] != '')
			{
				$count = $count->and_where('number.number_p', '=', $data['number_p']);
				$numbers = $numbers->and_where('number.number_p', '=', $data['number_p']);
			}

			if(isset($data['number_a']) && $data['number_a'] != '')
			{
				$count = $count->and_where('number.number_a', '=', $data['number_a']);
				$numbers = $numbers->and_where('number.number_a', '=', $data['number_a']);
			}

			if(isset($data['fio']) && $data['fio'] != '')
			{
				$count = $count->and_where('patients.fio', 'LIKE', '%'.$data['fio'].'%');
				$numbers = $numbers->and_where('patients.fio', 'LIKE', '%'.$data['fio'].'%');
			}
		}

		$count = $count->and_where('number.date_add', '>=', mktime(0, 0, 0, 1, 1, $data['year']))
			->and_where('number.date_add', '<=', mktime(23, 59, 59, 12, 31, $data['year']))
			->join('patients', 'LEFT')
			->on('number.patient_id', '=', 'patients.id')
			->order_by('number_p', 'desc')
			->count_all();

		$pagination = Pagination::factory(array(
			'total_items' => $count,
			'items_per_page' => 50,
			'view' => 'pagination/floating',
		));

		$numbers = $numbers->and_where('number.date_add', '>=', mktime(0, 0, 0, 1, 1, $data['year']))
			->and_where('number.date_add', '<=', mktime(23, 59, 59, 12, 31, $data['year']))
			->join('patients', 'LEFT')
			->on('number.patient_id', '=', 'patients.id')
			->limit($pagination->items_per_page)
			->offset($pagination->offset)
			->order_by('number_p', 'desc');

		$view = View::factory('main/search');

		$view->page_list = $pagination->render();
		$view->start = $pagination->offset;

		$view->numbers = $numbers->find_all();
		$view->data = $data;
		$view->statuses = $statuses;

		$this->template->content = $view->render();
	}
} // End Welcome
