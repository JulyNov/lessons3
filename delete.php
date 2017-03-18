<?php
include __DIR__ . '/main.php';

if ($_SESSION['id'] && $_GET['id']) {
    $sql = $db->prepare('DELETE FROM `Users` WHERE id=?;');
    $sql->bind_param('i', $_GET['id']);
    $sql->execute();
}

header('Location: /');
