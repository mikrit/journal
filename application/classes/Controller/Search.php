<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller_Base {

	public function action_index()
	{
		$data['fio'] = '';
		$data['number_p'] = '';
		$data['number_a'] = '';
		$data['fio'] = '';
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

		$count = 0;

		$numbers = ORM::factory('number');

		if ($_POST)
		{
			$data = $_POST;

			if($data['number_p'] != '')
			{
				$numbers = $numbers->and_where('number_p', '=', $data['number_p']);
			}

			if($data['number_a'] != '')
			{
				$numbers = $numbers->and_where('number_a', '=', $data['number_a']);
			}
		}

		$numbers = $numbers->and_where('date_add', '>=', mktime(0, 0, 0, 1, 1, $data['year']))->and_where('date_add', '<=', mktime(23, 59, 59, 12, 31, $data['year']))->order_by('number_p', 'desc');

		$view = View::factory('main/search');

		$view->numbers = $numbers->find_all();
		$view->data = $data;
		$view->statuses = $statuses;

		$this->template->content = $view->render();
	}

} // End Welcome
