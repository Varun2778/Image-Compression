


<?php 
 if (!in_array($Extension, $allowed)) {
                    echo 'File Type Error!';
                }


$html = file_get_contents('index.php');
                    libxml_use_internal_errors(true);
                    $dom = new DOMDocument();//Create new document with specified version number
                    $dom->loadHTML($html);
                    $descBox = $dom->getElementById('downloadArea');
                    $downloadTag = $dom->createElement('a');//Create new <style> tag with the css tags
                    $downloadTaghref = $dom->createAttribute('href');//Create the new attribute 'type'
                    $downloadTaghref->value = 'uploads/'.$File;//Add value to attribute
                    $downloadTag->appendChild($downloadTaghref);
                    $downloadTagDown = $dom->createAttribute('download');//Create the new attribute 'type'
                    $downloadTaghref->value = $File;//Add value to attribute
                    $downloadTag->appendChild($downloadTaghref);//Add the attribute to the style tag
                    $descBox->appendChild($downloadTag);//Add the style tag to document
                    echo $dom->saveHTML(); 










                    var element = document.getElementByID("downloadArea");
                    element.innerHTML = element.innerHTML + data;

 ?>