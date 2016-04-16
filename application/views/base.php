<?php defined('SYSPATH') or die('No direct script access.');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?=Html::style('media/css/style.css')?>
	<?=Html::style('media/css/date_input.css')?>
	<?=Html::style('media/css/print.css', array('media' => 'print'))?>


	<?=Html::script('media/js/jquery.js')?>
	<?=Html::script('media/js/jquery.date_input.js')?>
	<?=Html::script('media/js/tinymce/tinymce.min.js')?>
	<?=Html::script('media/js/project.js')?>

	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Журнал пациентов</title>
	<script type="text/javascript">$($.date_input.initialize);</script>

	<script type="text/javascript">
		tinymce.init({
			selector: "#comment",
			language : 'ru',
			width : 600,
			height : 300,
			plugins : "paste",
			paste_use_dialog : false,
			paste_auto_cleanup_on_paste : true,
			paste_convert_headers_to_strong : false,
			paste_strip_class_attributes : "all",
			paste_remove_spans : true,
			paste_remove_styles : true,
			paste_retain_style_properties : "",
			paste_text_sticky : true
		});
	</script>

	<script type="text/javascript">
		tinymce.init({
			selector: "#notes",
			language : 'ru',
			width : 600,
			height : 150,
			plugins : "paste",
			paste_use_dialog : false,
			paste_auto_cleanup_on_paste : true,
			paste_convert_headers_to_strong : false,
			paste_strip_class_attributes : "all",
			paste_remove_spans : true,
			paste_remove_styles : true,
			paste_retain_style_properties : "",
			paste_text_sticky : true
		});
	</script>
</head>

<body>
	<table id="t_page">
		<tr id="h">
			<td>
				<div id="logo">
					<div id="l_img"></div>
					<h1><?=Html::anchor('/', 'Журнал пациентов')?></h1>
					<div id="main_name"><?=Auth::instance()->get_user()->name?></div>
				</div>
				
				<div id="menu">
					<div class="t-center_m">
						<?=$menu;?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td id="p">	
				<div id="page">
					<?=$content?>
				</div>
			</td>
		</tr>
		<tr>
			<td id="f">
				<div id="footer">
				  <p>&copy;<?=date("Y")?> All Rights Reserved.</p>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>
