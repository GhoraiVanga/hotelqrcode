<?php
$img1 = new Image("QRCODE/scan.png");
$img2 = new Image("QRCODE/scan.png");
$img2->merge($img1,9,9);
$img2->save("QRCODE/merged.png",IMAGETYPE_PNG);




?>