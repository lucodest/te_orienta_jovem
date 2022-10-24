<?php

$conexao = mysqli_connect("localhost","root","","cadastro_professores");

if(!$conexao)
{
    die('Falha ao conectar: '. mysqli_connect_error());
}
?>