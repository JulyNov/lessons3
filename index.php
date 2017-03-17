<?php
include __DIR__ . '/main.php';

if (!$_SESSION['id']) {
    header('Location: /login.php');
    exit();
}

echo 'Привет Юзер<br>';
echo '<a href="/logout.php">Выход</a>';

