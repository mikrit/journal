<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title">Обновить статус гена</div>
	
	<?=Form::open('data/update_status/'.$id,array('method'=>'post'));?>
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
				<div id="edit"><?=Html::anchor('data/list_statuses', 'Назад')?></div>
			</td>
		</tr>
		<tr>
			<td>Статус гена:</td><td><?=Form::input('status', $data['status'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Исследование:</td><td><?=Form::select('analysis_id', $analyzes, $data['analysis_id']);?></td>
		</tr>
		<tr>
			<td class="right" colspan="2"><?=Form::input('submit', 'Обновить',array('id' => 'button', 'type'=>'submit'));?></td>
		</tr>	
	</table>
	<?=Form::close();?>
</div>