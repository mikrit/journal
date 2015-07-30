<?php defined('SYSPATH') or die('No direct script access.');?>

<ul><?$request = explode("/", Request::current()->uri());?>
	<li <?if($request[0] == 'search' || $request[0] == ''){echo 'id="current"';}?>>
		<?=HTML::anchor('search', 'Главная'); ?>
	</li>
	<li <?if($request[0] == 'patient'){echo 'id="current"';}?>>
		<?=HTML::anchor('patient', 'Пациенты'); ?>
	</li>
	<li <?if($request[0] == 'data'){echo 'id="current"';}?>>
		<?=HTML::anchor('data', 'Добавление данных'); ?>
	</li>
	<li <?if($request[0] == 'reports'){echo 'id="current"';}?>>
		<?=HTML::anchor('reports', 'Отчёты'); ?>
	</li>
	<?php if($admin){?>
		<li <?if($request[0] == 'adminka'){echo 'id="current"';}?>>
			<?=HTML::anchor('adminka', 'Админка'); ?>
		</li>
	<?}else{?>
		<li <?if($request[0] == 'user'){echo 'id="current"';}?>>
			<?=HTML::anchor('user', 'Личный кабинет'); ?>
		</li>
	<?}?>
	<li>
		<?=HTML::anchor('bauth/logout','Выход'); ?>
	</li>
</ul>
