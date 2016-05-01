<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Reports extends Controller_Base
{
	public function action_index()
	{
		$this->template->content = View::factory('reports/index')->render();
	}

	public function action_patients()
	{
		$_count = ORM::factory('patient');
		$patients = ORM::factory('patient');

		$data['to'] = time();
		$data['from'] = time();
		$data['department'] = '';
		$data['history'] = '';
		$count = -1;

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
				if($data['department'] != '')
				{
					$_count = $_count->and_where('department', 'LIKE', '%'.$data['department'].'%');
					$patients = $patients->and_where('department', 'LIKE', '%'.$data['department'].'%');
				}

				if($data['history'] != '')
				{
					$_count = $_count->and_where('history', 'LIKE', '%'.$data['history'].'%');
					$patients = $patients->and_where('history', 'LIKE', '%'.$data['history'].'%');
				}

				$count = $_count->and_where('date_add', '>=', $_POST['to'])->and_where('date_add', '<=', $_POST['from'])->count_all();
				$patients = $patients->and_where('date_add', '>=', $_POST['to'])->and_where('date_add', '<=', $_POST['from'])->find_all();
			}
		}

		$view = View::factory('reports/patients');

		$view->data = $data;
		$view->patients = $patients;
		$view->count = $count;

		$this->template->content = $view->render();
	}

	public function action_analysis()
	{
		$_count = ORM::factory('number');
		$numbers = ORM::factory('number');

        $count = -1;

        $data['to'] = time();
        $data['from'] = time();
        $data['status_id'] = 0;

        $analyzes = Helper::get_list_orm('analysis', 'title');

		foreach ($analyzes as $k => $v)
		{
			$data['analysis_id'] = $k;
			break;
		}

        if ($_POST)
        {
			if(!isset($_POST['status_id']))
			{
				$_POST['status_id'] = 0;
			}

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
				if($data['analysis_id'] != 0 || $data['status_id'] != 0)
				{
					$_count = $_count->join('analyzes_numbers')->on('analyzes_numbers.number_id', '=', 'number.id');

					$numbers = $numbers->join('analyzes_numbers')->on('analyzes_numbers.number_id', '=', 'number.id');
				}

				if($data['analysis_id'] != 0)
				{
					$_count = $_count->join('analyzes')->on('analyzes.id', '=', 'analyzes_numbers.analysis_id');
					$_count = $_count->and_where('analyzes.id', '=', $data['analysis_id']);

					$numbers = $numbers->join('analyzes')->on('analyzes.id', '=', 'analyzes_numbers.analysis_id');
					$numbers = $numbers->and_where('analyzes.id', '=', $data['analysis_id']);
				}

				if($data['status_id'] != 0)
				{
					$_count = $_count->join('statuses')->on('statuses.id', '=', 'analyzes_numbers.status_id');
					$_count = $_count->and_where('statuses.id', '=', $data['status_id']);

					$numbers = $numbers->join('statuses')->on('statuses.id', '=', 'analyzes_numbers.status_id');
					$numbers = $numbers->and_where('statuses.id', '=', $data['status_id']);
				}

				$count = $_count->and_where('date_add', '>=', $_POST['to'])->and_where('date_add', '<=', $_POST['from'])->count_all();
				$numbers = $numbers->and_where('date_add', '>=', $_POST['to'])->and_where('date_add', '<=', $_POST['from'])->find_all();
            }
        }

		$orm = ORM::factory('status')->where('analysis_id', '=', $data['analysis_id'])->find_all();

		$st[0] = '-';
		foreach($orm as $val)
		{
			$st[$val->id] = $val->status;
		}

		$orm = ORM::factory('analysis', $data['analysis_id']);

		$analises = $orm->title;

		$status = $st[$data['status_id']];
		$statuses = Form::select('status_id', $st, $data['status_id'], array('id' => 'statuses'));

        $view = View::factory('reports/analysis');

        $view->data = $data;
        $view->numbers = $numbers;
        $view->analyzes = $analyzes;
        $view->analises = $analises;
        $view->statuses = $statuses;
        $view->status = $status;
        $view->count = $count;

        $this->template->content = $view->render();
	}

    public function action_notes()
    {
        $_count = ORM::factory('number');
        $numbers = ORM::factory('number');

        $count = -1;

        $data['to'] = time();
        $data['from'] = time();
        $data['notes'] = '';

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
                if($data['notes'] != '')
                {
                    $_count = $_count->and_where('notes', 'LIKE', '%'.$data['notes'].'%');
                    $numbers = $numbers->and_where('notes', 'LIKE', '%'.$data['notes'].'%');
                }
                else
                {
                    $_count = $_count->and_where('notes', '<>', '');
                    $numbers = $numbers->and_where('notes', '<>', '');
                }

                $count = $_count->and_where('date_add', '>=', $_POST['to'])->and_where('date_add', '<=', $_POST['from'])->count_all();
                $numbers = $numbers->and_where('date_add', '>=', $_POST['to'])->and_where('date_add', '<=', $_POST['from'])->find_all();
            }
        }

        $view = View::factory('reports/notes');

        $view->data = $data;
        $view->numbers = $numbers;
        $view->count = $count;

        $this->template->content = $view->render();
    }
}