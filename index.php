<?php
include __DIR__ . '/main.php';

if (!$_SESSION['id']) {
    header('Location: /login.php');
    exit();
}

echo 'Привет Юзер<br>';
echo '<a href="/logout.php">Выход</a>';

$sql = $db->prepare ('SELECT id, name, age, description, email, foto FROM `Users`;');
$sql->execute();

$sql->bind_result($id, $name, $age, $description, $email, $foto);

echo '<table>';
while ($sql->fetch()) {
    echo '<tr>';
    printf('<td>%s</td>', $id);
    printf('<td>%s</td>', htmlspecialchars($name));
    printf('<td>%s</td>', htmlspecialchars($email));
    printf('<td>%s</td>', $age);
    printf('<td>%s</td>', htmlspecialchars($description));
    echo '</tr>';

}
echo '</table>';