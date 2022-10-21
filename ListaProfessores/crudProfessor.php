<?php
session_start();
require 'ConexaoBD.php';

if (isset($_POST['deletar_arma']))
{
    $arma_id = mysqli_real_escape_string($conexao,$_POST['deletar_arma']);

    $sql = "DELETE FROM arma WHERE id='$arma_id' ";
    $execComando = mysqli_query($conexao, $sql);

    if ($execComando)
    {
        $_SESSION['message'] = "Professor(a) excluido com sucesso!";
        header("Location: cardListView.php");
        exit(0);
    }
    else 
    {
        $_SESSION['message'] = "Não foi possivel excluir professor(a)!";
        header("Location: cardListView.php");
        exit(0);
    }
}

if (isset($_POST['editar_arma']))
{
    $arma_id = mysqli_real_escape_string($conexao,$_POST['arma_id']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $balas = mysqli_real_escape_string($conexao, $_POST['balas']);
    $dano = mysqli_real_escape_string($conexao, $_POST['dano']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $img = mysqli_real_escape_string($conexao, $_POST['img']);

    $sql = "UPDATE arma SET nome='$nome', balas='$balas', dano='$dano', preco='$preco', img = '$img' WHERE id='$arma_id'";
    $execComando = mysqli_query($conexao, $sql);

    if ($execComando)
    {
        $_SESSION['message'] = "Informações atualizadas com sucesso!";
        header("Location: cardListView.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Informações não atualizadas!";
        header("Location: cardListView.php");
        exit(0);
    }
}

if (isset($_POST['inserir_arma']))
{
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $balas = mysqli_real_escape_string($conexao, $_POST['balas']);
    $dano = mysqli_real_escape_string($conexao, $_POST['dano']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $img = mysqli_real_escape_string($conexao, $_POST['img']);

    $sql = "INSERT INTO arma VALUES (null, '$nome','$balas','$dano','$preco','$img')";
    $execComando = mysqli_query($conexao, $sql);
    if ($execComando)
    {
        $_SESSION['message'] = "Professor cadastrada com sucesso!";
        header("Location: cardListView.php");
        exit(0);
    }
    else 
    {
        $_SESSION['message'] = "Professor não cadastrada!";
        header("Location: cardListView.php");
        exit(0);
    }
}