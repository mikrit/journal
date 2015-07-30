<?php defined('SYSPATH') or die('No direct script access.');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Журнал пациентов</title>
<link href="/media/css/login-box.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div style="padding: 100px 0 0 250px;">
		<div id="login-box">
		
		<h2>Вход в систему</h2>
		<br/>
		<div style="color: #ffaabb; font-size: 16px; position: absolute; margin-left: 90px;"><?=$error?></div>
		<br/>
		<br/>
		<?=Form::open('login', array('method'=>'post', 'name' => 'login'));?>
			<div id="login-box-name" style="margin-top:20px;">
				Логин:
			</div>
			<div id="login-box-field" style="margin-top:20px;">
				<?=Form::input('login', '',array("class" => "form-login", "size" => "30", "maxlength" => "2048"));?>
			</div>
			<div id="login-box-name">
				Пароль:
			</div>
			<div id="login-box-field">
				<?=Form::password('password', '',array("class" => "form-login", "title" => "Password", "size" => "30", "maxlength" => "2048"));?>
			</div>
			<br />
			<span class="login-box-options">
				<?Html::anchor('bauth/forgotpassword', 'Восстановит звбытый пароль?', array("style" => "margin-left:130px;"));?>
			</span>
			<br />
			<br />
			<?=Form::input('button', '', array("type" => "image", "src" => "media/img/login-btn.png", "оnclick" => "javascript:document.myform.submit();", "width" => "103", "height" => "42", "style" => "margin-left:90px;"));?>
		<?=Form::close();?>
		</div>
	</div>
</body>
</html>
