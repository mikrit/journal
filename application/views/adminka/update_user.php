<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Обновить данные сотрудника</div>

<div class="t-center">
	<div id="profile">
		<?=Form::open('adminka/update_user/'.$id, array('name' => 'form1', 'method'=>'post'));?>
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
					<div id="edit"><?=Html::anchor('adminka/update_user', 'Назад');?></div>
				</td>
			</tr>
			<tr>
				<td>
					Имя и фамилия:
				</td>
				<td>
					<?=Form::input('name', $data->name, array('class' => 'input'));?>
				</td>
			</tr>
			<tr>
				<td>
					Логин:
				</td>
				<td>
					<?=Form::input('username', $data->username, array('class' => 'input'));?>
				</td>
			</tr>
			<tr>
				<td>
					Должность:
				</td>
				<td>
					<?=Form::input('position', $data->position, array('class' => 'input'));?>
				</td>
			</tr>
			<tr>
				<td>
					Админ:
				</td>
				<td>
					<?=Form::select('admin', array(0 => "Не админ", 1 => "Админ"), $admin);?>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="right">
					<?
					echo Form::input('submit', 'Обновить', array('id' => 'button', 'type'=>'submit'));
					echo Form::hidden('prov', '1');
					?>
				</td>
			</tr>
		</table>
		<?=Form::close();?>
		<br/><br/><br/><br/>
		<?=Form::open('adminka/update_user/'.$id, array('name' => 'form2', 'method'=>'post'));?>
		<table class="t_form">
			<tr>
				<td colspan="2" align="center">Изменить пароль</td>
			</tr>
			<tr>
				<td>
					Пароль
				</td>
				<td>
					<?=Form::password('password', '', array('class' => 'input'));?>
				</td>
			</tr>
			<tr>
				<td>
                    Повторить пароль
				</td>
				<td>
					<?=Form::password('password_confirm', '', array('class' => 'input'));?>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="right">
					<?
						echo Form::input('submit','Изменить пароль', array('id' => 'button', 'type'=>'submit'));
						echo Form::hidden('prov', '2');
					?>
				</td>
			</tr>
		</table>
		<?=Form::close();?>
	</div>
</div>