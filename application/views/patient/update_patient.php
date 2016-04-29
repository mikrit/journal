<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title">Обновление данных пациента</div>
	
	<?=Form::open('patient/update_patient/'.$id, array('method'=>'post'));?>
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
                <div id="edit"><?=Html::anchor('patient/data_patient/'.$id, 'Назад')?></div>
            </td>
        </tr>
		<tr>
			<td>ФИО:</td>
			<td><?=Form::input('fio', $data['fio'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Пол:</td>
			<td><?=Form::select('sex', $sex, $data['sex']);?></td>
		</tr>
		<tr>
			<td>Год рождения:</td>
			<td><?=Form::input('year', $data['year'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Контакты:</td>
			<td><?=Form::input('contacts', $data['contacts'], array('class' => 'input', 'style' => 'width: 600px'));?></td>
		</tr>
		<tr>
			<td>История болезни:</td>
			<td><?=Form::input('history', $data['history'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Отделение:</td>
			<td><?=Form::input('department', $data['department'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Диагноз:</td>
			<td><?=Form::textarea('diagnosis', $data['diagnosis'], array('id' => 'notes'));?></td>
		</tr>
		<tr>
			<td class="right" colspan="2"><?=Form::input('submit', 'Обновить',array('id' => 'button', 'type'=>'submit'));?></td>
		</tr>
	</table>
	<?=Form::close();?>
</div>