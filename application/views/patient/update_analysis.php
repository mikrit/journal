<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title">Обновление данных пациента</div>

	<?=Form::open('patient/update_analysis/'.$id, array('method'=>'post'));?>
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
			<td class="right" colspan="3">
				<div id="edit">
                    <?=Html::anchor('patient/data_patient/'.$patient->id, $patient->fio)?>
                    |
                    <?=Html::anchor('patient/data_analysis/'.$id, 'Назад')?>
                </div>
			</td>
		</tr>
		<tr>
			<td class="right" colspan="3"><?=Form::input('submit', 'Обновить',array('id' => 'button', 'type'=>'submit'));?></td>
		</tr>
		<tr>
			<td>Номер анализа:</td>
			<td colspan="2"><?=Form::input('number_a', $data['number_a'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Номер материала:</td>
			<td colspan="2"><?=Form::input('material_number', $data['material_number'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Кол-во материала:</td>
			<td colspan="2"><?=Form::input('material_count', $data['material_count'], array('class' => 'input'));?></td>
		</tr>
		<tr>
			<td>Метод исследования:</td>
			<td colspan="2"><?=Form::select('method_id', $methods, $data['method_id']);?></td>
		</tr>
		<tr>
			<td rowspan="<?=ceil(count($analyzes)/2)+1?>">Исследования:</td>
		</tr>
		<tr>
			<?$i=0;foreach($analyzes as $k => $v){?>
				<?$i++?>
				<td>
					<? echo Form::checkbox('analysis_'.$k, 1, $data['analysis_'.$k] == 0 ? false : true)." ".$v?>
					<br/>
					<?
					$analysis = ORM::factory('analysis', $k);
					$orm = $analysis->statuses->find_all();

					$statuses = array(0 => '-');
					foreach($orm as $status){
						$statuses[$status->id] = $status->status;
					}

					echo Form::select('status_'.$k, $statuses, $data['status_'.$k]);
					?>
				</td>
				<?if($i % 2 == 0){?>
					</tr>
					<tr>
				<?}?>
			<?}?>
		</tr>
		<tr>
			<td>Развёрнутый диагноз:</td>
			<td colspan="2"><?=Form::textarea('comment', $data['comment'], array('id' => 'comment'));?></td>
		</tr>
		<tr>
			<td>Примечания:</td>
			<td colspan="2"><?=Form::textarea('notes', $data['notes'], array('id' => 'notes'));?></td>
		</tr>
		<tr>
			<td>Сотрудник 1:</td>
			<td colspan="2"><?=Form::select('user1_id', $sings, $data['user1_id']);?></td>
		</tr>
		<tr>
			<td>Сотрудник 2:</td>
			<td colspan="2"><?=Form::select('user2_id', $sings, $data['user2_id']);?></td>
		</tr>
		<tr>
			<td>Сотрудник 3:</td>
			<td colspan="2"><?=Form::select('user3_id', $sings, $data['user3_id']);?></td>
		</tr>
		<tr>
			<td class="right" colspan="3"><?=Form::input('submit', 'Обновить',array('id' => 'button', 'type'=>'submit'));?></td>
		</tr>
	</table>
	<?=Form::close();?>
</div>