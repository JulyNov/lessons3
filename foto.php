<?php
include __DIR__ . '/main.php';

if (!$_SESSION['id']) {
    header('Location: /login.php');
    exit();
}

echo 'Привет Юзер<br>';
echo '<a href="/logout.php">Выход</a>';

$sql = $db->prepare('SELECT id, foto FROM `Users` WHERE foto IS NOT NULL;');
$sql->execute();

$sql->bind_result($id, $foto);

echo '<table cellspacing="0" border="1" cellpadding="5">';
while ($sql->fetch()) {
    echo '<tr>';
    printf('<td><img src="%s/%s"  height="200"></td>', $PhotoDir, $foto);
    echo '<td><a href="/delete.php?id=' . $id . '&foto=del" >Удалить Фото</a></td>';
    echo '</tr>';

}
echo '</table><br>';
echo '<a href="/index.php"> Список пользователей</a>';