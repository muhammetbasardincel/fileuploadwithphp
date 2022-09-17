# File Upload with PHP

- by Muhammet Başar Dinçel

## fileUpload.html

```
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
```
<hr /> 

## upload.php

```php
$file = $_FILES["files"];

// Get File Name 
$fileName = $file["name"];
echo "File Name: ". $fileName;

// Get File Path
$fileFullPath = $file["full_path"];
echo "File Path: ". $fileFullPath;

// Get File Type
$fileType = $file["type"];
echo "File Type: ". $fileType;

// Get File Size
$fileSize = $file["size"];
echo "File Size: " . $fileSize;

// File Size KB to MB convert
echo "File Size:". round($fileSize/1024/1024,2) . " MB";

// Get File Upload Error Code
$fileError = $file["error"]; // sorun yoksa 0 değeri dönüyor
echo "File Upload Error Code: " . $fileError;

// Get File Temp Path
$fileTemp = $file["tmp_name"];
echo "File Temp Path: " . $fileTemp;

// Get File Extension
$extension = explode(".", $fileFullName);
$extension = $extension[count($extension) - 1];
echo "File Extension: ".  $extension;
```
