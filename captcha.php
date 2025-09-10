<?php
session_start();
generate_captcha();

function generate_captcha()
{
    $captcha_code = substr(md5(uniqid(mt_rand(), true)), 0, 6);
    $_SESSION['captcha_code'] = $captcha_code;
    $image = imagecreate(100, 30);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $dot_color = imagecolorallocate($image, 0, 0, 0);
    imagefill($image, 0, 0, $background_color);
    for ($i = 0; $i < 1000; $i++) {
        $x = rand(0, 100);
        $y = rand(0, 100);
        imagesetpixel($image, $x, $y, $dot_color);
    }

    imagestring($image, 5, 20, 5, $captcha_code, $text_color);
    header("Content-type: image/png");
    imagepng($image);
    imagedestroy($image);
}

?>