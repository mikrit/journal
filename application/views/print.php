<?php defined('SYSPATH') or die('No direct script access.');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?=HTML::style('media/css/style.css')?>
	<?=HTML::style('media/css/print.css', array('media' => 'print'))?>

	<?=HTML::script('media/js/jquery.js')?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Журнал пациентов</title>
</head>

<body>
<table id="t_page">
	<tr>
		<td id="p">
			<div id="page_print">
				<?=$content?>
			</div>
		</td>
	</tr>
</table>
</body>
</html>
