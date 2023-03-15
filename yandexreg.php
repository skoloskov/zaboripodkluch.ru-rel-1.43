<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
global $USER;
if (!$USER->isAdmin()){
	die();
}
?>
<div class="container">
<br/>
<br/>
<?
if (isset($_POST['code'])){
	$code=$_POST['code'];
	$text='<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		</head>
		<body>Verification: '.$code.'</body>
	</html>';
	$filename='yandex_'.$code.'.html';
	if ($f=fopen('yandexverifications/'.$filename,'w')){
		fwrite($f, $text);
		fclose($f);
		echo 'Файл <a href="'.$filename.'" target="_blank">'.$filename.'</a> создан. Нажмите на ссылку для проверки';
	}
	else
		echo 'Ошибка создания файла '.$filename;

}
?>

<form method="post">
	<div>
		<p>Введите код подтверждения Яндекс</p>
		<input type="text" name="code">
	</div>
	<div>
		<input type="submit">
	</div>
</form>

</div>