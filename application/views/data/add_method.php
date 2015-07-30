<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title">Добавление метода исследования</div>

	<?=Form::open('data/add_method/',array('method'=>'post'));?>
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
				<div id="edit"><?=Html::anchor('data/list_methods', 'Назад')?></div>
			</td>
		</tr>
		<tr>
			<td>Вид метода:</td><td><?=Form::input('title', $data['title'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td class="right" colspan="2"><?=Form::input('submit', 'Добавить',array('id' => 'button', 'type'=>'submit'));?></td>
		</tr>
	</table>
	<?=Form::close();?>
</div>