<?php defined('SYSPATH') or die('No direct script access.');?>
	<div class="noprint">
		<div class="t-center">
			<div id="title">Поиск по пациентам</div>

			<?=Form::open('reports/patients', array('method'=>'post'));?>
			<table class="t_form">
				<tr>
					<td class="right" colspan="2">
						<div id="edit"><?=Html::anchor('reports', 'Назад')?></div>
					</td>
				</tr>
				<tr>
					<td>С:</td>
					<td colspan="2"><?=Form::input('to', preg_match('/\d{6,}/', $data['to']) ? date('Y-m-d', $data['to']) : $data['to'], array('name' => 'date', 'class' => 'date_input'));?></td>
				</tr>
				<tr>
					<td>По:</td>
					<td colspan="2"><?=Form::input('from', preg_match('/\d{6,}/', $data['from']) ? date('Y-m-d', $data['from']) : $data['from'], array('name' => 'date', 'class' => 'date_input'));?></td>
				</tr>
				<tr>
					<td>Отделение:</td>
					<td colspan="2"><?=Form::input('department', $data['department'], array('class' => 'input'));?></td>
				</tr>
				<tr>
					<td>История болезни:</td>
					<td colspan="2"><?=Form::input('history', $data['history'], array('class' => 'input'));?></td>
				</tr>
				<tr>
					<td class="right" colspan="3"><?=Form::input('submit', 'Поиск',array('id' => 'button', 'type'=>'submit'));?></td>
				</tr>
			</table>
			<?=Form::close();?>
		</div>
		<br/><br/>
	</div>

<?if($count == 0){?>
	<center><h2>Ни чего не найдено</h2></center>
<?}else if($count > 0){?>
	<table id="proj_task2">
		<tr id="head_tasks">
			<td colspan="5" style="text-align: left">
				Колличество: <?=$count?>
			</td>
		</tr>
		<tr id="head_tasks">
			<td>
				ФИО
			</td>
			<td>
				Отделение
			</td>
			<td>
				История болезни
			</td>
			<td>
				Дата приёма
			</td>
		</tr>
		<?foreach($patients as $patient){?>
			<tr>
				<td>
					<?=Html::anchor('patient/data_patient/'.$patient->id, $patient->fio)?>
				</td>
				<td>
					<?=$patient->department?>
				</td>
				<td>
					<?=$patient->history?>
				</td>
				<td>
					<?=date('d.m.Y', $patient->date_add)?>
				</td>
			</tr>
		<?}?>
	</table>
<?}?>