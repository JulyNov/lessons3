<?php
session_start();

try {
    $db = new mysqli('localhost', 'root', '','lsn3', 3306);
    $db->query('SET NAMES "UTF-8"');
} catch (Exception $Exception) {
    die($Exception->getMessage());
}
