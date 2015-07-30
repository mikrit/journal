<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title">Добавление нового сотрудника</div>
	
	<?=Form::open('adminka/register',array('method'=>'post'));?>
	<table class="t_form">
		<?php if(count($errors)):?>
			<?php foreach ($errors as $error):?>
				<tr>
					<td class="error" colspan="2"><?=$error?></td>
				</tr>
			<?php endforeach;?>
		<?php endif;?>
		<tr><td colspan="2" style="color: green"><?=$message?></td></tr>
		<tr>
			<td class="right" colspan="2">
				<div id="edit"><?=Html::anchor('adminka', 'Назад')?></div>
			</td>
		</tr>
		<tr>
			<td>Имя и фамилия:</td><td><?=Form::input('name', $data['name'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Должность:</td><td><?=Form::input('position', $data['position'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Логин:</td><td><?=Form::input('username', $data['username'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Пароль:</td><td><?=Form::password('password', '', array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Повторить пароль:</td><td><?=Form::password('password_confirm', '', array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td class="right" colspan="2"><?=Form::input('submit', 'Создать',array('id' => 'button', 'type'=>'submit'));?></td>
		</tr>	
	</table>
	<?=Form::close();?>
</div>