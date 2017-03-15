<?php
$db = @new mysqli('localhost', 'root', '','lsn3', 3306);
if (mysqli_connect_errno()){
    die(mysqli_connect_error());
}
$db->query('SET NAMES "UTF-8"');
