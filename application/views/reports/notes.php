<?php defined('SYSPATH') or die('No direct script access.');?>


<div class="t-center">
   <div id="title">Поиск по примечанию</div>

   <?=Form::open('reports/notes', array('method'=>'post'));?>
   <table class="t_form">
       <tr>
           <td class="right" colspan="3">
               <div id="edit"><?=Html::anchor('reports', 'Назад')?></div>
           </td>
       </tr>
       <tr>
           <td>С:</td>
           <td colspan="2">
               <?=Form::input('to', preg_match('/\d{6,}/', $data['to']) ? date('Y-m-d', $data['to']) : $data['to'], array('name' => 'date', 'class' => 'date_input'));?>
           </td>
       </tr>
       <tr>
           <td>По:</td>
           <td colspan="2">
               <?=Form::input('from', preg_match('/\d{6,}/', $data['from']) ? date('Y-m-d', $data['from']) : $data['from'], array('name' => 'date', 'class' => 'date_input'));?>
           </td>
       </tr>
       <tr>
           <td>Примечание:</td>
           <td colspan="2">
               <?=Form::input('notes', $data['notes'], array('class' => 'input'));?>
           </td>
       </tr>
       <tr>
           <td class="right" colspan="3">
               <?=Form::input('submit', 'Поиск',array('id' => 'button', 'type'=>'submit'));?>
           </td>
       </tr>
   </table>
   <?=Form::close();?>
</div>

<br/><br/>

<?if($count == 0){?>
    <center><h2>Ничего не найдено</h2></center>
<?}else if($count > 0){?>
    <table id="proj_task2">
        <tr id="head_tasks">
            <td colspan="6" style="text-align: left">
                Количество: <?=$count?>
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
                Дата приёма
            </td>
            <td>
                Примечание
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
                    <?=date('d.m.Y', $number->date_add)?>
                </td>
                <td>
                    <?=$number->notes?>
                </td>
            </tr>
        <?}?>
    </table>
<?}?>