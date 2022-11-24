<?php
$db = mysqli_connect("localhost", "root", "", "te_orienta_joven");
if (!$db) {
    die('<h2>Erro de conexão com o MySql!</h2>');
}
mysqli_query($db,"SET NAMES utf8");
mysqli_query($db,"SET CHARACTER_SET utf8");
?>
