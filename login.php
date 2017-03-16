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
        $sql = $db->prepare('SELECT id, password FROM Users WHERE email = ?;');
        $sql->bind_param('s', $_POST['email']);
        $sql->execute();

        if (!$sql->num_rows) {
            $ERRORS[] = 'Я вас не знаю, мы не знакомы. Вы можете зарегистрироваться <a href="/reg.php"> на этой странице </a>';
        }else{

        }

        $password = sha1($_POST['password']);

        $_SESSION['id'] = $sql->insert_id;
        header('Location: /');
        die();

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
<form action="login.php.php" method="post">
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
</form>
</body>
</html>