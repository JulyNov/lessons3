<?php
$ERRORS = [];

foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

if ($_POST) {
    if (!$_POST['email']) {
        $ERRORS[] = 'Необходим емаил';
    }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $ERRORS[] = 'Не похоже на емаил';
    }
    if (!$_POST['password']) {
        $ERRORS[] = 'Необходим пароль';
    }elseif (mb_strlen($_POST['password']) < 2) {
        $ERRORS[] = 'Слишком короткий пароль';
    }
    if (!$_POST['name']) {
        $ERRORS[] = 'Введите имя';
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<meta charset="UTF-8">
<title>Регистрация</title>

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

<h1>Регистрация</h1>
<br>
<?php
if ($ERRORS) {
    echo 'Внесите исправления:' . '<br>';
    echo '<ul>';
    foreach ($ERRORS as $value) {
        echo '<li>' . $value . '</li>' ;
    }
    echo '</ul>';
}
?>
<form action="reg.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="login">Логин (email)</label><br/>
        <input type="email" name="email" id="login" value="<?php echo htmlspecialchars($_POST['email']); ?>">
    </div>
    <div>
        <label for="password">Пароль</label><br/>
        <input type="password" name="password" id="password" value="<?=htmlspecialchars($_POST['password'])?>">
    </div>
    <div>
        <label for="name">Имя</label><br/>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
    </div>
    <div>
        <label for="age">Возраст</label><br/>
        <input type="number" min="0" max="120" step="1" name="age" id="age"
               value="<?php echo htmlspecialchars($_POST['age']); ?>">
    </div>
    <div>
        <label for="description">Описание</label><br/>
        <textarea name="description" id="description"><?php echo htmlspecialchars($_POST['description']); ?>
        </textarea>

    </div>

    <div>
        <label> <input type="file" name="file">Файл фото</label>
    </div>
    <div>
        <input type="submit" value="Отправить">
    </div>
</form>
</body>
</html>