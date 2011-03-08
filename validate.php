<?php
define("WIDTH", 88);
define("HEIGHT", 20);
header("Content-type: image/PNG");

if(!isset($_SESSION)) {
	session_start();
}

$im = @imagecreate(WIDTH, HEIGHT);

//define color set
imagecolorallocate($im, 255, 255, 255);

$blue = imagecolorallocate($im, 0, 0, 200);

$i = 0;
while($i < 18) {
	$x1 = rand(0, WIDTH);
	$y1 = rand(0, HEIGHT);
	
	$x2 = $x1+rand(-5, 5);
	$y2 = $y1+rand(-8, 8);
	$color = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));
	imageline($im, $x1, $y1, $x2, $y2, $color);
	$i++;            
}

$src = "ABCDEFGHJKMNKPRSUVWXY2345678";
$font = './timesbi.ttf'; 
$array_src = str_split($src, 1);
$keys = array_rand($array_src, 4);
$code = '';
for($i = 0; $i < 4; $i++) {
	$ch= $array_src[$keys[$i]];
	$code .= $ch;
	$color = imagecolorallocate($im, rand(0, 200), rand(0, 200), rand(0, 200));
	imagettftext($im, 16, rand(0,30), 10 + $i*18, 18, $color, $font, $ch);
}

$_SESSION['scode'] = $code;

imagepng($im);
imagedestroy($im);
