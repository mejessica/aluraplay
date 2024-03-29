<?php 

require 'conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false) {
    header('Location: /index.php?sucesso=0');
    exit();
}

$url = filter_input(INPUT_POST,'url', FILTER_VALIDATE_URL);

if ($url === false) {
    header('Location: /index.php?sucesso=0');
    exit();
}

$title = filter_input(INPUT_POST, 'title');
if ($title === false) {
    header('Location: /index.php?sucesso=0');
    exit();
}


$sql = 'UPDATE videos SET url = :url, title = :title WHERE id = :id;';
$statement = $pdo->prepare($sql);
$statement->bindValue(':url', $url);
$statement->bindValue(':title', $title);
$statement->bindValue(':id', $id, PDO::PARAM_INT);

if ($statement->execute() === false) {
    header('Location: /index.php?sucesso=0');
} else {
    header('Location: /index.php?sucesso=1');
}

?>