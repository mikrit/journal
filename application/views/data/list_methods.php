<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Виды методов исследования</div>

<div id="edit">
	<?=Html::anchor('data/add_method/', '+ Добавить новый метод')?>
</div>
<table id="proj_task">
	<tr>
		<td class="right_t" colspan="8">
			<?=Html::anchor('data', 'Назад')?>
		</td>
	</tr>
	<tr id="head_tasks">
		<td>
			№
		</td>
		<td>
			Вид метода
		</td>
	</tr>
	<? $i=1;
	foreach($data as $method){
		$class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
		<tr <?=$class?>>
			<td>
				<?=$i++?>
			</td>
			<td>
				<?=Html::anchor('data/update_method/'.$method->id, $method->title)?>
			</td>
		</tr>
	<?}?>
</table>