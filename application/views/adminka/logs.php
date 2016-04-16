<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Изменения</div>

<table id="proj_task">
	<tr>
		<td class="right_t" colspan="8">
			<?=Html::anchor('adminka', 'Назад')?>
		</td>
	</tr>
	<tr id="head_tasks">
		<td>
			Дата
		</td>
		<td>
			Имя
		</td>
		<td>
			Где
		</td>
		<td>
			Было
		</td>
		<td>
			Стало
		</td>
	</tr>
	<? $i=1;
	foreach($logs as $log){
		$class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
		<tr>
			<td>
				<?=$log->date?>
			</td>
			<td>
				<?=$log->user->name?>
			</td>
			<td>
				<?=$log->table?>
			</td>
			<td>
				<?=$log->before?>
			</td>
			<td>
				<?=$log->after?>
			</td>
		</tr>
	<?}?>
</table>