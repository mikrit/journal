<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="ptt">
	<div id="title">Анализ "<?=$data->number_a?>"</div>

	<table id="proj2">
		<tr>
			<td class="right" colspan="2">
				<?
				echo Html::anchor('patient/update_analysis/'.$data->id, 'Редактировать данные анализа');
				if($admin)
				{
					echo " |".Html::anchor('patient/delete_analysis/'.$data->id, 'Удалить анализ', array("onclick" => "return confirm('Удалить анализ \'$data->number_a\'?')"));
				}
				echo " |".Html::anchor('patient/data_patient/'.$data->patient_id, 'Назад');
				?>
				<br/><br/>
			</td>
		</tr>
	</table>

	<table id="patient">
		<tr>
			<td style="height: 25px; width: 15%;">Дата анализа:</td>
			<td><b><?=date('d.m.Y', $data->date_add)?></b></td>
		</tr>
		<tr>
			<td style="height: 25px; width: 15%;">Пациент:</td>
			<td><b><?=Html::anchor('patient/data_patient/'.$patient->id, $patient->fio)?></b></td>
		</tr>
		<tr>
			<td>Исследования:</td>
			<td><b>
					<?
					foreach($data->analyzes->find_all() as $v)
					{
						echo $v->title."<br/>";
					}
					?>
				</b></td>
		</tr>
		<tr>
			<td style="height: 25px;">Статусы гена:</td>
			<td>
				<b>
					<?
					foreach($data->analyzes->find_all() as $v)
					{
						$stat = DB::select('status_id', 'analysis_id')
							->from('analyzes_numbers')
							->where('number_id', '=', $data->id)
							->and_where('analysis_id', '=', $v->id)
							->as_object()
							->execute();

						foreach($stat as $val)
						{
							$status = ORM::factory('status', $val->status_id);
							echo $status->status."<br/>";
						}
					}
					?>
				</b>
			</td>
		</tr>
		<tr>
			<td style="height: 25px;">Метод исследования:</td>
			<td><b><?=$data->method->title?></b></td>
		</tr>
		<tr>
			<td style="height: 25px;">Развёрнутый диагноз:</td>
			<td><b><?=$data->comment?></b></td>
		</tr>
		<tr>
			<td style="height: 25px;">Номер материала:</td>
			<td><b><?=$data->material_number?></b></td>
		</tr>
		<tr>
			<td style="height: 25px;">Кол-во материала:</td>
			<td><b><?=$data->material_count?></b></td>
		</tr>
		<tr>
			<td style="height: 25px;">Сотрудник 1:</td>
			<td><b><?=$data->user1->name?></b></td>
		</tr>
		<tr>
			<td style="height: 25px;">Сотрудник 2:</td>
			<td><b><?=$data->user2->name?></b></td>
		</tr>
		<tr>
			<td style="height: 25px;">Сотрудник 3:</td>
			<td><b><?=$data->user3->name?></b></td>
		</tr>
		<tr>
			<td style="height: 25px;">Примечания:</td>
			<td><b><?=$data->notes?></b></td>
		</tr>
	</table>
	<br/><br/><br/>

	<b>
		<?=Html::anchor('print/print_data/'.$data->id, 'Печать карточки пациента', array('onclick' => 'this.target="_blank";'))?>
		<br/>
		<?=Html::anchor('print/print_conclusion/'.$data->id, 'Печать заключения', array('onclick' => 'this.target="_blank";'))?>
	</b>
</div>
