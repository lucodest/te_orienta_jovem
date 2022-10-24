<?php
session_start();
require 'ConexaoBD.php';

if (isset($_POST['deletar_professor']))
{
    $professor_id = mysqli_real_escape_string($conexao,$_POST['deletar_professor']);

    $sql = "DELETE FROM professor WHERE cod_professor='$professor_id' ";
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

if (isset($_POST['editar_professor']))
{
    $professor_id = mysqli_real_escape_string($conexao,$_POST['cod_professor']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $formacao = mysqli_real_escape_string($conexao, $_POST['formacao']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $valor = mysqli_real_escape_string($conexao, $_POST['dinheiro']);
    $img = mysqli_real_escape_string($conexao, $_POST['foto']);

    $sql = "UPDATE professor SET nome='$nome', cpf='$cpf', formacao='$formacao', email='$email', telefone='$telefone', senha='$senha', dinheiro='$valor', foto = '$img' WHERE cod_professor='$professor_id'";
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

if (isset($_POST['inserir_professor']))
{
    $professor_id = mysqli_real_escape_string($conexao,$_POST['cod_professor']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $formacao = mysqli_real_escape_string($conexao, $_POST['formacao']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $valor = mysqli_real_escape_string($conexao, $_POST['dinheiro']);
    $img = mysqli_real_escape_string($conexao, $_POST['foto']);

    $sql = "INSERT INTO professor VALUES (null, '$nome','$cpf','$formacao','$email','$telefone','$senha','$valor','$img')";
    $execComando = mysqli_query($conexao, $sql);
    if ($execComando)
    {
        $_SESSION['message'] = "Professor(a) cadastrado com sucesso!";
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