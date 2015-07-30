<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Статусы гена</div>

<div id="edit">
    <?=Html::anchor('data/add_status/', '+ Добавить новый статус')?>
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
            Статус гена
        </td>
        <td>
			Исследование
        </td>
    </tr>
	<? $i=1;
	foreach($data as $status){
		$class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
		<tr <?=$class?>>
			<td>
				<?=$i++?>
			</td>
			<td>
				<?=Html::anchor('data/update_status/'.$status->id, $status->status)?>
			</td>
			<td>
				<?=$status->analysis->title?>
			</td>
		</tr>
	<?}?>
</table>