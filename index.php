<?php
require_once 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

$image = Image::make('parrot.jpg');
$image->resize(200,null, function ($constraint) {
    $constraint->aspectRatio();
});

$image->text('Привет!', $image->getWidth() / 2 + 25,$image->getHeight() / 2 - 50, function (Intervention\Image\AbstractFont $font) {
    $font->size(32);
    $font->file(__DIR__.'/westhorn.ttf');
    $font->color([232, 26, 53]);
    $font->align('right');
    $font->valign('center');
});

$image->save('new_parrot.jpg');

echo $image->response('jpg');
