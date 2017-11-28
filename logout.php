<?php
//include 'core.php';
session_start();
//echo $http_referer;
session_destroy();

header('Location: index.php');

?>