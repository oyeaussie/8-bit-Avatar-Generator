<?php

$sex = 'M';

$maleImgDir = __DIR__ . '/img/male/';
$femaleImgDir = __DIR__ . '/img/female/';
$properties = ['background','face','hair','eye','clothes','mouth'];

foreach ($properties as $key => $value) {
	if ($sex == 'M') {
		$image[$value] = imagecreatefrompng($maleImgDir . $value . rand(1, count(preg_grep(('/^' . $value . '.*$/'),scandir($maleImgDir)))) . '.png');
	} elseif ($sex == 'F') {
		$image[$value] = imagecreatefrompng($femaleImgDir . $value . rand(1, count(preg_grep(('/^' . $value . '.*$/'),scandir($femaleImgDir)))) . '.png');
	}
}
$finalImage = $image['background'];
array_shift($image);

foreach ($image as $key => $value) {
	imagecopy($finalImage, $value, 0, 0, 0, 0, 400, 400);
}
//output to browser window
header('Content-Type: image/png');
imagepng($finalImage);


// save file to location on server

// imagepng($image_1, 'final_img.png');

?>
