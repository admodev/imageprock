<?php

function create_thumbnail($image_name)
{
  $output_image = new Imagick($image_name);
  $output_image->thumbnailImage(100, 0);

  $thumbnail_path = './assets/thumbnails/' . basename($image_name);
  $output_image->writeImage($thumbnail_path);

  return $thumbnail_path;
}

$images_list = explode("\n", rtrim(shell_exec('ls ./assets/')));

foreach ($images_list as $image) {
  if (!empty($image)) {
    create_thumbnail("./assets/{$image}");
  }
}
