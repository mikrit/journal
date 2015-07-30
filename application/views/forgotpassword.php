<?php defined('SYSPATH') or die('No direct script access.');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?=Html::style('media/css/style.css')?>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Восстановление пароля</title>
	<script type="text/javascript">$($.date_input.initialize);</script>
</head>

<body>
	<table id="t_page">
		<tr id="h">
			<td>
			</td>
		</tr>
		<tr>
			<td id="p">	
				<div id="page">
					<div class="t-center">
						<div id="title">Восстановление пароля</div>
						<div class="error"><?=$error?></div>
						<div style="color: green;"><?=$mess?></div>
						<div class="right"><?=Html::anchor('login', 'Назад');?></div>
						<?=Form::open('bauth/forgotpassword', array('method'=>'post'));?>
						<table class="t_form">
							<?php if(count($errors)):?>
								<?php foreach ($errors as $error):?>
									<tr>
										<td class="error" colspan="2"><?=$error?></td>
									</tr>
								<?php endforeach;?>
							<?php endif;?>
							<tr>
								<td>E-mail:</td>
								<td><?=Form::input('email', '', array('class' => 'input'));?></td>
							</tr>
							<tr>
								<td class="right" colspan="2"><?=Form::input('submit','Отправить',array('type'=>'submit'));?></td>
							</tr>	
						</table>
						<?=Form::close();?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td id="f">
			</td>
		</tr>
	</table>
</body>
</html>