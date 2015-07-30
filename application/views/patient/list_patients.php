<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="noprint">
	<div class="t-center">
		<div id="title">Поиск</div>
		<?=Form::open('patient', array('method'=>'post'));?>
		<table class="t_form">
			<tr>
				<td>ФИО пациента:</td>
				<td colspan="2"><?=Form::input('fio', $data['fio'], array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td>Год рождения:</td>
				<td colspan="2"><?=Form::input('year', $data['year'], array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td class="right" colspan="3"><?=Form::input('submit', 'Поиск',array('id' => 'button', 'type'=>'submit'));?></td>
			</tr>
		</table>
		<?=Form::close();?>
	</div>
	<br/><br/>
</div>



<div id="title">Список пациентов</div>

<div id="edit">
    <?=Html::anchor('patient/add_patient/', '+ Добавить нового пациента')?>
</div>
<table id="proj_task">
    <tr id="head_tasks">
        <td>
            ФИО
        </td>
        <td>
            Пол
        </td>
		<td>
			Год рождения
		</td>
		<td>
			История болезни
		</td>
        <td>
            Отделение
        </td>
        <td>
            Диагноз
        </td>
		<td>
			Дата регистрации
		</td>
    </tr>
    <? $i=1;
    foreach($patients as $patient){
        $class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
		<tr <?=$class?>>
			<td style="white-space: nowrap;">
				<?=Html::anchor('patient/data_patient/'.$patient->id, $patient->fio)?>
			</td>
			<td>
				<?=$patient->sex==0?'Mужской':'Женский'?>
			</td>
			<td>
				<?=$patient->year?>
			</td>
			<td>
				<?=$patient->history?>
			</td>
			<td>
				<?=$patient->department?>
			</td>
			<td align="left">
				<?=$patient->diagnosis?>
			</td>
			<td>
				<?=date('d.m.Y', $patient->date_add)?>
			</td>
		</tr>
	<?}?>
</table>