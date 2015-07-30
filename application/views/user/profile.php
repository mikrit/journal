<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title">Редактирование данных</div>

	<?=Form::open('user', array('name' => 'form1', 'method'=>'post'));?>
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
				<td>Имя:</td>
				<td><?=Form::input('name', $user->name, array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td>Должность:</td>
				<td><?=Form::input('position',$user->position, array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td colspan="2" class="right">
					<?
						echo Form::input('submit','Обновить данные', array('type'=>'submit'));
						echo Form::hidden('prov', '1');
					?>
				</td>
			</tr>
		</table>
	<?=Form::close();?>

	<br/><br/><br/><br/>

	<?=Form::open('user', array('name' => 'form2', 'method'=>'post'));?>
		<table class="t_form">
			<?php if(count($errors2)):?>
				<?php foreach ($errors2 as $error):?>
					<tr>
						<td class="error" colspan="2"><?=$error?></td>
					</tr>
				<?php endforeach;?>
			<?php endif;?>
			<tr><td colspan="2" style="color: green"><?=$message2?></td></tr>
			<tr>
				<td colspan="2" align="center">Изменить пароль</td>
			</tr>
			<tr>
				<td>Пароль:</td>
				<td><?=Form::password('password', '', array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td>Повторите пароль:</td>
				<td><?=Form::password('password_confirm', '', array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td colspan="2" class="right">
					<?
						echo Form::input('submit','Изменить пароль', array('type'=>'submit'));
						echo Form::hidden('prov', '2');
					?>
				</td>
			</tr>
		</table>
	<?=Form::close();?>
</div>