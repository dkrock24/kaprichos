<?php
session_start();

session_destroy();

$newURL = 'index.php';
header('Location: '.$newURL);
?>