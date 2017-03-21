<?php
include __DIR__ . '/main.php';

if ($_SESSION['id'] && $_GET['id']) {
    $sql = $db->prepare('SELECT foto FROM `Users` WHERE id = ?;');
    $sql->bind_param('i', $_GET['id']);
    $sql->execute();
    $sql->bind_result($foto);
    $sql->fetch();
    $sql->close();

    if ($foto) {
        $sql = $db->prepare('UPDATE Users SET foto=NULL WHERE id=?;');
        $sql->bind_param('i', $_GET['id']);
        $sql->execute();
        $sql->close();
        unlink(__DIR__ . $PhotoDir . $foto);
    }

    if (!$_GET['foto']) {
        $sql = $db->prepare('DELETE FROM `Users` WHERE id=?;');
        $sql->bind_param('i', $_GET['id']);
        $sql->execute();
    }
}

header('Location: /');
