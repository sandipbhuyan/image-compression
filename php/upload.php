<?php
$name = ''; $type = ''; $size = ''; $error = '';
   function compress_image($source_url, $destination_url, $quality) {

      $info = getimagesize($source_url);

          if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source_url);

          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);

          elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source_url);

          imagejpeg($image, $destination_url, $quality);
          return $destination_url;
        }

            if ($_POST) {

            if ($_FILES["file"]["error"] > 0) {
            $error = $_FILES["file"]["error"];
        }
            else if (($_FILES["file"]["type"] == "image/gif") ||
            ($_FILES["file"]["type"] == "image/jpeg") ||
            ($_FILES["file"]["type"] == "image/png") ||
            ($_FILES["file"]["type"] == "image/pjpeg")) {

            $url = 'images/'.rand(100000,10000000).'.jpg';
            $filename = compress_image($_FILES["file"]["tmp_name"], $url, 50);
            header('location: index.php');
        }else {
            $error = "Uploaded image should be jpg or gif or png";
            echo $error;
        }
        }
?>
