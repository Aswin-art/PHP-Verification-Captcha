<?php

session_start();

$rand = md5(rand());
$captcha = substr($rand, 0, 4);
$_SESSION['captcha'] = $captcha;

$width = 100;
$height = 50;
$image = imagecreate($width, $height);
$bgColor = imagecolorallocate($image, 0, 0, 0);
$font_size = 20;
$font_x = 10;
$font_y = 40;
$text_color = imagecolorallocate($image, 230, 230, 230);
$line_color = imagecolorallocate($image, 255, 255, 255);
for($i = 0; $i < 4; ++$i){
    imageline($image, 0, round(rand() % 50), 100, round(rand() % 30), $line_color);
}
$dot_color = imagecolorallocate($image, 100, 150, 255);
for($i = 0; $i < 1000; $i++){
    imagesetpixel($image, round(rand() % 100), round(rand() % 50), $dot_color);
}
imagettftext($image, $font_size, 10, $font_x, $font_y, $text_color, 'aileron.regular.ttf', $captcha);
imagejpeg($image);
imagedestroy($image);
header('Content-Type: image/jpeg');