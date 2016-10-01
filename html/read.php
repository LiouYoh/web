<?php

$file = '2.jpg';

header("Content-type: image/JPEG",true);

$image = fread(fopen($file,r),filesize($file));

echo $image;

?>