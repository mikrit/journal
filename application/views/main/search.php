<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="noprint">
	<div class="t-center">
		<div id="title">Поиск</div>

		<?=Form::open('search', array('method'=>'get'));?>
		<table class="t_form">
			<tr>
				<td>Год анализа:</td>
				<td colspan="2"><?=Form::input('year', $data['year'], array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td>ФИО пациента:</td>
				<td colspan="2"><?=Form::input('fio', $data['fio'], array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td>Порядковый номер:</td>
				<td colspan="2"><?=Form::input('number_p', $data['number_p'], array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td>Номер анализа:</td>
				<td colspan="2"><?=Form::input('number_a', $data['number_a'], array('class' => 'input'));?></td>
			</tr>
			<tr>
				<td class="right" colspan="3"><?=Form::input('submit', 'Поиск',array('id' => 'button', 'type'=>'submit'));?></td>
			</tr>
		</table>
		<?=Form::close();?>
	</div>
	<br/><br/>
</div>

<table id="proj_task2">
	<tr id="head_tasks">
		<td>
			№
		</td>
		<td>
			Статус
		</td>
		<td>
			Номер анализа
		</td>
		<td>
			ФИО
		</td>
		<td>
			Год рождения
		</td>
		<td>
			История болезни
		</td>
		<td>
			Номер материала
		</td>
		<td>
			Кол-во материала
		</td>
		<td>
			Диагноз
		</td>
		<td>
			Дата приёма
		</td>
	</tr>
	<? $i=1;
	foreach($numbers as $number)
	{
		$class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
		<tr <?=$class?>>
			<td>
				<?=$number->number_p?>
			</td>
			<td>
				<? echo "<a id='$number->id' href=javascript:change_status('$number->id')>".Html::image('media/img/'.$number->status.'.png', array('alt' => $statuses[$number->status], 'title' => $statuses[$number->status]))."</a>" ?>
			</td>
			<td>
				<?=Html::anchor('patient/data_analysis/'.$number->id, $number->number_a)?>
			</td>
			<td>
				<?=Html::anchor('patient/data_patient/'.$number->pid, $number->fio)?>
			</td>
			<td>
				<?=$number->patient->year?>
			</td>
			<td>
				<?=$number->patient->history?>
			</td>
			<td>
				<?=$number->material_number?>
			</td>
			<td>
				<?=$number->material_count?>
			</td>
			<td>
				<?=$number->patient->diagnosis?>
			</td>
			<td>
				<?=date('d.m.Y', $number->date_add)?>
			</td>
		</tr>
	<?$i++;}?>
</table>

<div id="pages" class="center"><?=$page_list?></div>