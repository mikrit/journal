<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Отчёты</div>

<table id="user">
	<tr>
		<td>
			<?Html::anchor('reports/explores', 'По исследованиям');?>
			<!--br/-->
			<?=Html::anchor('reports/patients', 'По пациенту');?>
			<br/>
			<?=Html::anchor('reports/analysis', 'По анализу и статусу');?>
			<br/>
			<?=Html::anchor('reports/notes', 'По примечаниям');?>
			<br/>
		</td>
	</tr>
</table>