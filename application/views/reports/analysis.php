<?php defined('SYSPATH') or die('No direct script access.');?>
    <div class="noprint">
        <div class="t-center">
            <div id="title">Поиск по исследованиям</div>

            <?=Form::open('reports/analysis', array('method'=>'post'));?>
            <table class="t_form">
                <tr>
                    <td class="right" colspan="3">
                        <div id="edit"><?=Html::anchor('reports', 'Назад')?></div>
                    </td>
                </tr>
                <tr>
                    <td>С:</td>
                    <td colspan="2"><?=Form::input('to', preg_match('/\d{6,}/', $data['to']) ? date('Y-m-d', $data['to']) : $data['to'], array('name' => 'date', 'class' => 'date_input'));?></td>
                </tr>
                <tr>
                    <td>По:</td>
                    <td colspan="2"><?=Form::input('from', preg_match('/\d{6,}/', $data['from']) ? date('Y-m-d', $data['from']) : $data['from'], array('name' => 'date', 'class' => 'date_input'));?></td>
                </tr>
                <tr>
                    <td>Исследование:</td>
                    <td colspan="2"><?=Form::select('analysis_id', $analyzes, $data['analysis_id'], array('id' => 'analisis'));?></td>
                </tr>
                <tr>
                    <td>Статус:</td>
                    <td colspan="2" id="st"><?=$statuses?></td>
                </tr>
                <tr>
                    <td class="right" colspan="3"><?=Form::input('submit', 'Поиск',array('id' => 'button', 'type'=>'submit'));?></td>
                </tr>
            </table>
            <?=Form::close();?>
        </div>
        <br/><br/>
    </div>

<?if($count == 0){?>
    <center><h2>Ни чего не найдено</h2></center>
<?}else if($count > 0){?>
    <table id="proj_task2">
        <tr id="head_tasks">
            <td colspan="5" style="text-align: left">
                Колличество: <?=$count?>
            </td>
        </tr>
        <tr id="head_tasks">
            <td>
                ФИО
            </td>
            <td>
                Номер анализа
            </td>
            <td>
                Исследования
            </td>
            <td>
                Статус гена
            </td>
            <td>
                Дата приёма
            </td>
        </tr>
        <?foreach($numbers as $number){?>
			<tr>
				<td>
					<?=Html::anchor('patient/data_patient/'.$number->patient->id, $number->patient->fio)?>
				</td>
				<td>
					<?=Html::anchor('patient/data_analysis/'.$number->id, $number->number_a)?>
				</td>
				<td>
					<?=$analises?>
				</td>
				<td>
					<?=$status?>
				</td>
				<td>
					<?=date('d.m.Y', $number->date_add)?>
				</td>
			</tr>
        <?}?>
    </table>
<?}?>