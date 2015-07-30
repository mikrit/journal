<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Data extends Controller_Base
{
    public function action_index()
    {
        $this->template->content = View::factory('data/index')->render();
    }

    public function action_list_analyzes()
    {
        $view = View::factory('data/list_analyzes');
        $view->data = ORM::factory('analysis')->find_all();

        $this->template->content = $view->render();
    }

    public function action_add_analysis()
    {
        $errors = array();
        $message = "";

        $data['title'] = '';

        if ($_POST)
        {
            $post = Model_Analysis::validation_analysis($_POST);
            $data = $_POST;

            if (!$post->check())
            {
                $errors = $post->errors('projects/mes');
            }
            else
            {
            	$orm = ORM::factory('analysis');
                $orm->values($_POST)->create($post);
                
                $this->redirect('data/list_analyzes');
            }
        }

        $view = View::factory('data/add_analysis');

        $view->data = $data;
        $view->errors = $errors;
        $view->message = $message;

        $this->template->content = $view->render();
    }

    public function action_update_analysis()
    {
		$id = $this->request->param('id');
        $orm = ORM::factory('analysis', $id);

        if(!$orm->loaded())
        {
            $this->redirect('data/list_analyzes');
        }
        
        $errors = array();
        $message = "";
        $data = $orm->as_array();

        if ($_POST)
        {
            $post = Model_Analysis::validation_analysis($_POST);
			$data = $_POST;
            
            if (!$post->check())
            {
                $errors = $post->errors('projects/mes');
            }
            else
            {
                $orm->values($_POST)->update($post);               
                $message = "Анализа успешно обновлён";
            }
        }

        $view = View::factory('data/update_analysis');

        $view->id = $orm->id;
        $view->data = $data;
        $view->errors = $errors;
        $view->message = $message;

        $this->template->content = $view->render();
    }
    
	public function action_list_statuses()
    {
        $view = View::factory('data/list_statuses');
        $view->data = ORM::factory('status')->find_all();

        $this->template->content = $view->render();
    }

    public function action_add_status()
    {
        $errors = array();
        $message = "";

        $data['status'] = '';
		$data['analysis_id'] = 1;

		$analyzes = Helper::get_list_orm('analysis', 'title');

        if ($_POST)
        {
            $post = Model_Status::validation_status($_POST);
            $data = $_POST;

            if (!$post->check())
            {
                $errors = $post->errors('projects/mes');
            }
            else
            {
            	$orm = ORM::factory('status');
                $orm->values($_POST)->create($post);

                $this->redirect('data/list_statuses');
            }
        }

        $view = View::factory('data/add_status');

        $view->data = $data;
        $view->errors = $errors;
        $view->message = $message;
		$view->analyzes = $analyzes;

        $this->template->content = $view->render();
    }

    public function action_update_status()
    {
		$id = $this->request->param('id');
        $orm = ORM::factory('status', $id);

        if(!$orm->loaded())
        {
            $this->redirect('data/list_statuses');
        }
        
        $errors = array();
        $message = "";
        $data = $orm->as_array();

		$analyzes = Helper::get_list_orm('analysis', 'title');

        if ($_POST)
        {
            $post = Model_Status::validation_status($_POST);
			$data = $_POST;
            
            if (!$post->check())
            {
                $errors = $post->errors('projects/mes');
            }
            else
            {
                $orm->values($_POST)->update($post);               
                $message = "Статус гена успешно обновлён";
            }
        }

        $view = View::factory('data/update_status');

        $view->id = $orm->id;
        $view->data = $data;
        $view->errors = $errors;
        $view->message = $message;
		$view->analyzes = $analyzes;

        $this->template->content = $view->render();
    }

	public function action_list_methods()
	{
		$view = View::factory('data/list_methods');
		$view->data = ORM::factory('method')->find_all();

		$this->template->content = $view->render();
	}

	public function action_add_method()
	{
		$errors = array();
		$message = "";

		$data['title'] = '';

		if ($_POST)
		{
			$post = Model_Method::validation_method($_POST);
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm = ORM::factory('method');
				$orm->values($_POST)->create($post);

				$this->redirect('data/list_methods');
			}
		}

		$view = View::factory('data/add_method');

		$view->data = $data;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}

	public function action_update_method()
	{
		$id = $this->request->param('id');
		$orm = ORM::factory('method', $id);

		if(!$orm->loaded())
		{
			$this->redirect('data/list_methods');
		}

		$errors = array();
		$message = "";
		$data = $orm->as_array();

		if ($_POST)
		{
			$post = Model_Method::validation_method($_POST);
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm->values($_POST)->update($post);
				$message = "Метод успешно обновлён";
			}
		}

		$view = View::factory('data/update_method');

		$view->id = $orm->id;
		$view->data = $data;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}
}