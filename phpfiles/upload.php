<?php
session_start();
include('DB.php');
global $ConnectionDB;
global $Connection;

$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = '../uploads';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5

    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
 
    move_uploaded_file($tempFile,$targetFile); //6

    date_default_timezone_set("Asia/Kolkata");
    $CurrentTime=time();
    $DateTime=strftime("%d-%m-%Y %H:%M:%S",$CurrentTime); 
	$Userid=$_SESSION['UserId'];
	$Data= $_FILES['file']['name'];

	$QueryData="INSERT INTO uploadscompress(userid,data,extension,timevalue) VALUES('$Userid','$Data','$extension','$DateTime')";
    $Execute_QueryData=mysqli_query($Connection,$QueryData);
     
}
?>    