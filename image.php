<?php
session_start();

require_once('Text/CAPTCHA.php');
$captcha = Text_CAPTCHA::factory('Image');

$text_image_options = array(
    'font_size'=>'30',
	'font_path'=>'./',
    'font_file'=>'arial.ttf'
);

$captcha->init(150,60,NULL,$text_image_options);

$image_data = $captcha->getCAPTCHAAsJPEG();

$_SESSION['captcha_phrase'] = $captcha->getPhrase();


header("Content-type: image/jpeg");
echo $image_data;
?>