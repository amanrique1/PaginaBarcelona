<?php
session_start();
unset($_SESSION['Administrador']);


session_destroy();
header('Location:index.php');
exit();

?>

