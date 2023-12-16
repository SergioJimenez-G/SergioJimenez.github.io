<?php
session_start();

// Image creation
$ancho = 220;
$alto = 90;
$img = imagecreatetruecolor($ancho, $alto);

// Colores
$bgColor 		= imagecolorallocate($img, 225, 210, 225);
$stringColor 	= imagecolorallocate($img, 90, 90, 90);
$lineColor 		= imagecolorallocate($img, 175, 150, 175);
$noiseColor 	= imagecolorallocate($img, 207, 239, 250);
$texto_color[0] = imagecolorallocate($img, 255, 0, 0);
$texto_color[1] = imagecolorallocate($img, 51, 166, 207);

// background
imagefill($img, 0, 0, $bgColor);

// fill
for ($i = 0; $i < ($ancho * $alto) / 3; $i++)
{
	imagefilledellipse($img, mt_rand(0, $ancho), mt_rand(0, $alto), 1, 1, $noiseColor);
}

// Horizontal lines
for ($i = 10; $i <= $alto; $i += 10)
{
	imageline($img, 0, $i - 10, $ancho, $i, $lineColor);
}

// Vertical lines
for ($i = 10; $i <= $ancho; $i += 10)
{
	imageline($img, $i - 10, 0, $i, $alto, $lineColor);
}

// Code
$caracteres = 'ABCDEFGHKLMNPRSTUVWYZ23456789';
$longitud 	= 5;

function generarCodigo($longitud, $caracteres)
{
	$code = '';
	for ($i = 1, $cslen = strlen($caracteres); $i <= $longitud; ++$i)
	{
		$code .= strtoupper($caracteres{rand(0, $cslen - 1)});
	}
	return $code;
}

$texto = generarCodigo($longitud, $caracteres);

unset($_SESSION['captcha']);
$_SESSION['captcha']['blue'] = $_SESSION['captcha']['red'] = '';

// available fonts
$thefonts = array('debussy.ttf','Krystal.ttf','anorexia.ttf', 'chrome_black.ttf');

// position, color, and size of the characters
for ($j = 0; $j < mb_strlen($texto); $j++)
{
	imagettftext($img, 28, rand(-20,20), 20 + ($j * 35), 54, $texto_color[$j % 2], 'typos/'.$thefonts[rand(0,3)], $texto[$j]);

    if (($j % 2) == 1)
	{
		$_SESSION['captcha']['blue'] .= $texto[$j];
	}
	else
	{
		$_SESSION['captcha']['red'] .= $texto[$j];
	}
}

// captcha print
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);