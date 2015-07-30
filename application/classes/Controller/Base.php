<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template
{
	public $template = 'base';
	public $admin = '';
	public $user_id = '';
	
	public function __construct(Request $request, Response $response)
	{
		parent::__construct($request, $response);
 
		// если пользователь не админ, переадресовываем его на главную страницу
		if (!Auth::instance()->logged_in()){
			$this->redirect(Route::get('auth')->uri());
		}
			
		$this->user_id = Auth::instance()->get_user()->id;
		$this->admin = ORM::factory('user', $this->user_id)->roles->where('name', '=', 'admin')->find();
	}
 
	public function before()
	{
		parent::before();
		$this->template->content = '';
		$this->template->foot = 'foot';
		
		$user_id = Auth::instance()->get_user()->id;
		$admin = ORM::factory('user', $user_id)->roles->where('name', '=', 'admin')->find();
		
		$view_menu = View::factory('menu');
		$view_menu->admin = $admin->loaded();
		$this->template->menu = $view_menu->render();
	}
		
	public function action_index()
	{
		$this->redirect('search');
	}
}
