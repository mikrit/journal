<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Редактирование данных системы</div>

<table id="user">
    <tr>
        <td>
            <?=Html::anchor('data/list_analyzes', 'Виды анализов');?>
            <br/>
            <?=Html::anchor('data/list_statuses', 'Стутус гена');?>
            <br/>
			<?=Html::anchor('data/list_methods', 'Методы исследования');?>
			<br/>
        </td>
    </tr>
</table>