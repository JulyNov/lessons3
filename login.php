<?php
include __DIR__ . '/main.php';

$ERRORS = [];

foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

if ($_POST) {

    if (!$_POST['email']) {
        $ERRORS[] = 'Необходим емаил';
    }
    if (!$_POST['password']) {
        $ERRORS[] = 'Необходим пароль';
    }

    if (!$ERRORS) {
        $sql = $db->prepare('SELECT id, password FROM `Users` WHERE email = ?;');
        $sql->bind_param('s', $_POST['email']);
        $sql->execute();
        $sql->bind_result($id, $password);
        $row = $sql->fetch();

        if (!$row) {
            $ERRORS[] = 'Я вас не знаю. Вы можете зарегистрироваться <a href="/reg.php"> на этой странице </a>';
        } else {
            $entered_password = sha1($_POST['password']);

            if ($password === $entered_password) {
                $_SESSION['id'] = $id;
                header('Location: /');
                die();
            }
            $ERRORS[] = 'Пароль неверный';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<meta charset="UTF-8">
<title>Вход</title>

<head>
    <style type="text/css">
        div {
            margin: 0 0 10px;
        }

        label, p {
            font-weight: bold;
        }


    </style>
</head>
<body>

<h1>Вход</h1>
<br>
<?php
if ($ERRORS) {
    echo 'Внесите исправления:' . '<br>';
    echo '<ul>';
    foreach ($ERRORS as $value) {
        echo '<li>' . $value . '</li>';
    }
    echo '</ul>';
}
?>
<form action="login.php" method="post">
    <div>
        <label for="login">Логин (email)</label><br/>
        <input type="email" name="email" id="login" value="<?php echo htmlspecialchars($_POST['email']); ?>">
    </div>
    <div>
        <label for="password">Пароль</label><br/>
        <input type="password" name="password" id="password" value="<?= htmlspecialchars($_POST['password']) ?>">
    </div>

    <div>
        <input type="submit" value="Мамой клянусь!">
    </div>
    <div>
        <a href="reg.php"> Встать в наши дружные ряды.</a>
    </div>
</form>
</body>
</html>