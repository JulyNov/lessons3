<?php
include __DIR__ . '/main.php';

if (!$_SESSION['id']) {
    header('Location: /login.php');
    exit();
}

echo 'Привет Юзер<br>';
echo '<a href="/logout.php">Выход</a>';

$sql = $db->prepare('SELECT id, name, age, description, email, foto FROM `Users`;');
$sql->execute();

$sql->bind_result($id, $name, $age, $description, $email, $foto);

echo '<table cellspacing="0" border="1" cellpadding="5">';
while ($sql->fetch()) {
    echo '<tr>';
    printf('<td>%s</td>', $id);
    printf('<td>%s</td>', htmlspecialchars($name));
    printf('<td>%s</td>', htmlspecialchars($email));
    printf('<td>%s</td>', $age);
    printf('<td>%s</td>', htmlspecialchars($description));
    echo '<td><a href="/delete.php?id=' . $id . '" >Удалить Юзера</a></td>';
    echo '</tr>';

}
echo '</table>';