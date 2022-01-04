<?php 
session_start();
include('phpfiles/functions.php');
include('phpfiles/DB.php');
global $ConnectionDB;
global $Connection;
    if (isset($_POST["percentage"])) {
        $Percentage=(int)trim(mysqli_real_escape_string($Connection,$_POST["percentage"]));
        $Userid=$_SESSION['UserId'];
        $allowed = array('gif', 'png', 'jpg','jpeg');
        $QueryCheckUser="SELECT * FROM uploadscompress WHERE userid='$Userid'";
        $ExecuteCheckUser = mysqli_query($Connection,$QueryCheckUser);
        if (mysqli_num_rows($ExecuteCheckUser)>0){
            $downloadBtnsFiles=array();
            $filesZipArray=array();
            // 
            while($DataRows=mysqli_fetch_array($ExecuteCheckUser)){
                // 
                $FileName=$DataRows['data'];
                $Extension=$DataRows['extension'];
                $TimeDate=$DataRows['timevalue'];
                // 
                $source_img = 'uploads/'.$FileName;
                $destination_img = 'uploads/'.$FileName;
                // 
                if (!in_array($Extension, $allowed)) {
                    echo 'File Type Error!';
                    exit;
                }
                if (compress($source_img,$destination_img,$Percentage)) {
                    // 
                    array_push($downloadBtnsFiles,$FileName);
                }
                array_push($filesZipArray,'uploads/'.$FileName);
            }
            if ($downloadBtnsFiles) {
                $zipFileName = "uploads/zipfiles/".$_SESSION['UserId'].".zip";
                $result = createZipArchive($filesZipArray, $zipFileName);
                //
                $zipFileDownload= $_SESSION['UserId'].".zip";
                $value = array( 
                    $downloadBtnsFiles,
                    $zipFileDownload
                );  
                // 
                $UserId = uniqid (rand (),true);
                $_SESSION['UserId']=$UserId;
                // 
                echo json_encode($value);
                exit;
            }else{
                echo "Error During Compression!!";
                exit;
            } 
        }
        else{
           echo "No File Uploaded";
           exit;
        }    
    }
    // 
    if (isset($_POST["filenamedelete"])) {
        $FileNameDelete=mysqli_real_escape_string($Connection,$_POST["filenamedelete"]);
        $Userid=$_SESSION['UserId'];
        // 
        $ViewFileQuery = mysqli_fetch_assoc(mysqli_query($Connection, "SELECT data FROM uploadscompress WHERE userid ='$Userid' and data='$FileNameDelete'"));
        $DataFile = $ViewFileQuery['data'];
        if ($DataFile) {
            $FilePath='uploads/'.$DataFile;
            // 
            $Delete_query="DELETE FROM uploadscompress WHERE userid ='$Userid' and data='$DataFile' ";
            $Run_query=mysqli_query($Connection,$Delete_query);
            if ($Run_query) {
                // 
                unlink($FilePath);
                // 
                echo "File Deleted";
            }else{
                echo "Error!";
            }
        }else{
            echo "File Removed";
        }
    }
 ?>