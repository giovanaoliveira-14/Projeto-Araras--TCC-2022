<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
unset($_SESSION['id_usu']);
header("Location: ../index.html");

?>