<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Base
{
	public function action_index()
	{
		$errors = array();
		$errors2 = array();
		$message = '';
		$message2 = '';

		$user_id = Auth::instance()->get_user()->id;
		$user = ORM::factory('user', $user_id);

		if ($_POST)
		{
			if($_POST['prov'] == 1)
			{
				$post = Model_User::validation_prof($_POST);

				if (!$post->check())
				{
					$errors = $post->errors('projects/mes');
				}
				else
				{
					$user->values($_POST)->update();
					$message = "Данные успешно изменены";
				}
			}
			elseif($_POST['prov'] == 2)
			{
				$post = Model_User::validation_up2($_POST);

				if (!$post->check())
				{
					$errors2 = $post->errors('projects/mes');
				}
				else
				{
					$user->values($_POST)->update();
					$message2 = "Пароль успешно изменён";
				}
			}

		}

		$view_profile = View::factory('user/profile');
		$view_profile->user = $user;
		$view_profile->message = $message;
		$view_profile->message2 = $message2;
		$view_profile->errors = $errors;
		$view_profile->errors2 = $errors2;
		$this->template->content = $view_profile->render();
	}
}
