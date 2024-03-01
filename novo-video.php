<?php

require 'conexao.php';

$url = filter_input(INPUT_POST,'url', FILTER_VALIDATE_URL);

if ($url === false) {
    header('Location: /index.php?sucesso=0');
    exit();
}

$title =  filter_input(INPUT_POST, 'title'); 
if ($title=== false) {
    header('Location: /index.php?sucesso=0');
    exit();
}


$sql = 'INSERT INTO videos (url, title)VALUES(?,?)';
$statement= $pdo->prepare($sql);
$statement->bindValue(1, $url );
$statement->bindValue(2, $title);

if($statement->execute()===false){
    header('Location: /index.php?sucess=0');
}else{
    header('Location: /index.php?sucess=1');
}



