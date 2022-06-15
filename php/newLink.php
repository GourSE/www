<!DOCTYPE html>
<html lang="zh_tw">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pokémob 和咖波在縮短網址！">
    <title>Pokémob!</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/link.css">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <section class="banner">
        <a href="http://pokemob.net">
            <img class="icon" src="/img/capoo_logo.png" alt="Capoo as Logo" title="霓霓吃西瓜">
        </a>
    </section>
    <a class="important_link" href="/link">返回</a>

<?php
// link and name must come in without spaces

$link = $_POST['link'];
$name = $_POST['name'];
$file_name = "../sub/link/links.txt";
$fileCat = file_get_contents($file_name, "a");

if ($link == "" or $name == "") {
    unset($_POST);
    die("<p class='form'> 空白表單？</p>");
    // header("Location: http://pokemob.net");
} elseif (str_contains($fileCat, "\n" . $name . " ")){
    die("<p class='form'><a href='https://link.pokemob.net/" . $name . "'>link.pokemob.net/" . $name . "</a> 已經存在</p>");
} else {
    if (str_contains($link, "://")){

    } else {
        $link = "http://" . $link;
    }

    if (str_contains($name, " ") or str_contains($link, " ")){
        unset($_POST);
        die("<p class='form'> '" . $name . "' 內有空格，不合法</p>");
    } else {
        $file = fopen($file_name, "a");
        fwrite($file, $name . " " . $link . "\n");
        fclose($file);
        unset($_POST);

        echo("<p class='form'><a href='https://link.pokemob.net/" . $name . "'>link.pokemob.net/" . $name . "</a> 創造成功</p>");
    }



}

?>

    
</body>

</html>
