<?php 

$file = __DIR__.'/123.jpg';

function resizePicture($file, $width, $height) {

    // получение списка параметров переданного изображения
    $pic = getimagesize($file);
    // создание нового изображения требуемого размера
    $image = imagecreatetruecolor($width, $height);
    // создание нового изображения из переданного файла 
    $src = imagecreatefromjpeg($file);
    // копирование и изменение размеров переданного изображения
    imagecopyresized($image, $src, 0, 0, 0, 0, $width, $height, $pic[0], $pic[1]);

    // вариант вывода полученного изображения непосредственно в браузер
    // header("Content-type: {$pic['mime']}");
    // imagejpeg($image);
    // imagedestroy($image);

    // вариант создания нового файла в текущей директории с любым уровнем сжатия (последний аргумент)
    imagejpeg($image, 'dest.png', 75);
    // вывод в браузер созданного файла
    echo '<img src = "dest.png" alt = "picture">'; 
    imagedestroy($image);

}

resizePicture($file, 500, 400);

?>

