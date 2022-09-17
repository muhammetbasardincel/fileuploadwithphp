<?php

if(isset($_FILES["file"])){
    $file = $_FILES["file"];

    $fileError = $file["error"];
    if($fileError == 0){
        $fileSize = $file["size"];
        if($fileSize < (1024 * 1024 * 2)){
            $fileType = $file["type"];
            if ($fileType == "image/jpeg" || $fileType == "image/png") {
                $fileName = $file["name"];
                $fileTemp = $file["tmp_name"];
                $newFileName = "dosyalar/" . time() . "." . Extension($fileName);
                if (move_uploaded_file($fileTemp, $newFileName)) {
                    echo "Image uploaded successfully.<br>";
                    echo "<img src='$newFileName' width='100' height='100'>";
                }
                else {
                    echo "An error occurred while uploading the image.";
                }
            }
            else {
                echo "You can only send JPG and PNG images.";
            }
        }
        else{
            echo "Image cannot be larger than 2 MB";
        }
    }
    else{
        echo "An error occurred while sending the file..!";
    }
}

function Extension($fileFullName)
{
    $extension = explode(".", $fileFullName);
    $extension = $extension[count($extension) - 1];
    return $extension;
}