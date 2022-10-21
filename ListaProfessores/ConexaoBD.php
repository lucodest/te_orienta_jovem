<?php

$conexao = mysqli_connect("localhost","root","","pCards");

if(!$conexao)
{
    die('Falha ao conectar: '. mysqli_connect_error());
}
?>