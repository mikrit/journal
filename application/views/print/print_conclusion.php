<?php defined('SYSPATH') or die('No direct script access.');?>

<table id="table_print_top">
	<tr>
		<td width="10%">
			<?=HTML::image('media/img/logo2.png', array('id' => 'print_img2'))?>
		</td>
		<td width="50%">
			ООО «КОД-МЕД-БИО»<br/>
			г.Москва, Каширское шоссе д.23<br/>
			ФГБНУ "РОНЦ им. Н.Н.Блохина", зона Б-5
		</td>
		<td width="40%">
			<b>Лаборатория молекулярной патологии</b><br/>
			Часы приема пациентов:<br/>
			Пн.-Птн.: с 10.00 до 16.00<br/>
			<b>Тел. 8(499) 324-17-49</b><br/>
			e-mail: labgenpat@mail.ru
		</td>
	</tr>
</table>

<table class="table_print" style="border-bottom: 1px solid #000" border="0">
	<tr>
		<td>
			Исследования:<br/><b><?
				for($i=0; $i < $analizis_count-1; $i++)
				{
					echo $analizis[$i]->title.", ";
				}
				echo $analizis[$i]->title;
				?></b>
		</td>
		<td>
			№ Исследования: <b><?=$data->number_a?></b>
		</td>
	</tr>
	<tr>
		<td>
			ФИО: <b><?=$data->patient->fio?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Пол: <?=$data->patient->sex==0?'Mужской':'Женский'?>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Год рождения: <?=$data->patient->year?>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			История болезни: <b><?=$data->patient->history?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			Клинический диагноз: <b><?=$data->patient->diagnosis?></b>
		</td>
	</tr>
	<tr>
		<td>
			№ гистологии: <?=$data->material_number?>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Предоставленный материал: <?=$data->material_count?>
		</td>
		<td>
		</td>
	</tr>
</table>

<table class="table_print" border="0">
	<tr>
		<td>
			Метод: <?=$data->method->title?>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<b>Заключение</b>
		</td>
	</tr>
	<tr>
		<td>
			<?=$data->comment?>
		</td>
	</tr>
</table>

<table class="table_print2" border="0">
	<tr>
		<td>
			Дата выдачи заключения: <?=Date('d.m.Y г.')?>
		</td>
	</tr>
	<?if($data->user1->name != NULL){?>
		<tr>
			<td>
				<?=$data->user1->position?> <?=$data->user1->name?>: ________________
			</td>
		</tr>
	<?}?>
	<?if($data->user2->name != NULL){?>
		<tr>
			<td>
				<?=$data->user2->position?> <?=$data->user2->name?>: ________________
			</td>
		</tr>
	<?}?>
	<?if($data->user3->name != NULL){?>
		<tr>
			<td>
				<?=$data->user3->position?> <?=$data->user3->name?>: ________________
			</td>
		</tr>
	<?}?>
</table>

<script type="text/javascript">
	var is_chrome = function () { return Boolean(window.chrome); }
	if(is_chrome) 
	{
		window.print();
		setTimeout(function(){
			window.close();}, 10000); 
		//give them 10 seconds to print, then close
	}
	else
	{
		$(function(){
		window.print();
		self.close();
		});
	}
</script>