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
$rm_file = "../files/".$_POST["removeFile"];

if ($rm_file == "../files/"){
    echo "<p class='log_text'>Empty file, escaped<br></p>";
}else{
    if(file_exists($rm_file)){
        unlink($rm_file);
        echo "<p class='log_text'>Removed ".$rm_file."<br></p>";
    }else{
        echo "<p class='log_text'>No such file<br></p>";
    }
}
?>

<a class="important_link" href="/admin/file">返回</a>
<a class="important_link" href="/admin">主頁</a>
<a class="important_link" href="/files">瀏覽檔案</a>

</body>
</html>