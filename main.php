<?php
session_start();

try {
    // лучше все конфигурации вынести в отдельный файл и например назвать его config.php
    $db = new mysqli('localhost', 'root', '', '', 3306);
    $db->query('SET NAMES "UTF-8"');

} catch (Exception $Exception) {
    die($Exception->getMessage());
}

$PhotoDir = '/photos/';
