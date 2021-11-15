<?php
// Create image instances
$src = imagecreatefrompng('QRCODE/101.png');
$dest = imagecreatefrompng('Media/SCAN.png');
  
// Copy and merge
imagecopymerge($dest, $src, 600, 1000, 0, 0, 500, 200, 75);
  
// Output and free from memory
header('Content-Type: image/png');
imagegif($dest);
  
//imagedestroy($dest);
//imagedestroy($src);
?>