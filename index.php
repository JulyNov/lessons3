<?php

$connection = @new mysqli('localhost', 'root', 'root','lsn3', 3306);
if (mysqli_connect_errno()){
    die(mysqli_connect_error());
}