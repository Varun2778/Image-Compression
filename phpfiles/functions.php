<?php
function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/jpg') 
        $image = imagecreatefromjpeg($source);
    
    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}

// $source_img = 'source.jpg';
// $destination_img = 'destination .jpg';

// $d = compress($source_img, $destination_img, 90);

/* create a compressed zip file */
function createZipArchive($files = array(), $destination = '', $overwrite = false) {

   if(file_exists($destination) && !$overwrite) { return false; }

   $validFiles = array();
   if(is_array($files)) {
      foreach($files as $file) {
         if(file_exists($file)) {
            $validFiles[] = $file;
         }
      }
   }

   if(count($validFiles)) {
      $zip = new ZipArchive();
      if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) == true) {
         foreach($validFiles as $file) {
            $zip->addFile($file,$file);
         }
         $zip->close();
         return file_exists($destination);
      }else{
          return false;
      }
   }else{
      return false;
   }
}



?>


