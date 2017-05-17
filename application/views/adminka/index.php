<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Админка</div>

<table id="user">
	<tr>
		<td>
			<?=Html::anchor('adminka/list_users', 'Сотрудники'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?Html::anchor('adminka/logs', 'Логирование'); ?>
		</td>
	</tr>
</table>