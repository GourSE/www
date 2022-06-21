<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <title>Upload!</title>
</head>
<body>
    <section class="banner">
        <a href="/">
            <img class="icon" src="/img/capoo_logo.png" alt="Capoo as Logo" title="霓霓吃西瓜">
        </a>
    </section>


<?php
$fileCnt = count( $_FILES["uploadFile"]["name"] );
for( $i = 0; $i < $fileCnt; $i++ )
{
    if( $_FILES["uploadFile"]["error"][$i] == 0 )
    {
        echo "<p class='log_text'>File Temp: " . $_FILES["uploadFile"]["tmp_name"][$i] . "<br></p>";
        echo "<p class='log_text'>File Name: " . $_FILES["uploadFile"]["name"][$i] . "<br></p>";
        echo "<p class='log_text'>File Type: " . $_FILES["uploadFile"]["type"][$i] . "<br></p>";
        echo "<p class='log_text'>File Size: " . $_FILES["uploadFile"]["size"][$i] . "<br></p>";
        $dest = "../files/".$_FILES["uploadFile"]["name"][$i];
        if (copy( $_FILES["uploadFile"]["tmp_name"][$i], $dest )){
        echo "<p class='log_text'><br>Uploaded as: " . $dest . "<br><br></p>";
        } else{
          echo "<p class='log_text'>faild <br><br></p>";
        }
    }
    else if( $_FILES["uploadFile"]["error"][$i] <> 4 )
        echo $_FILES["uploadFile"]["name"][$i] . " File upload faild";
}
?>

<a class="important_link" href="/admin/file">返回</a>
<a class="important_link" href="/admin">主頁</a>
<a class="important_link" href="/files">瀏覽檔案</a>

</body>
</html>