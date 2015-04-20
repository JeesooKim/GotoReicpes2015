<?php

#FILE name: randomImage.php
#Content: to create an Image Authentication page.
#Source: www.php-mysql-tutorial.com/wikis/php-tutorial/user-aithentication-with-image-verification.aspx
#Ref: http://php.net/manual/en/function.imagestring.php
#Referenced on March 18, 2015 by Jeesoo Kim

session_start();

//generate 5 digit random number;
$rand= rand(10000, 99999);

//create the hash for the random number and put it in the session
$_SESSION['image_random_value']= md5($rand);    //session value is set to the has of the random number

//create the image, 60x30 pixels
$image=imagecreate(60,30);

//use black as the background image
$bgColor = imagecolorallocate($image, 0,0,0);

//the text color is yellow
$textColor=imagecolorallocate($image, 252,210,9);

//write the random number
imagestring($image, 5,5,8,$rand, $textColor);
//Draws a string at the given coordinates. (resource $image, int $font, int $x, int $y, string $string, int $color)
//the top left corner: (x,y)-=(0,0)

//send several headers to ensure the image is not cached

//always modified
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . "GMT");

//HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control:post-checl=0, pre-check=0", false);

//HTTP/1.0
header("Pragma: no-cache");

//send the content type header so the image is displayed properly
header("Content-type: image/jpeg");

//send the image to the browser
imagejpeg($image);

//destroy the image to free up the memory
imagedestroy($image);
?>