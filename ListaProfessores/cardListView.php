<!doctype html>
<html lang="pt-BR">
    <?php 
    require('cardComponent.php'); 
    require('ConexaoBD.php');
    session_start();
    ?>

    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo_professores.css">
    <title> Professores</title>
    </head>

    <body>
    <div class="container">
        <!-- Componente 1 MENU NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Professores</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Registros</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="cardListView.php"> Novo Registro <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Componente 2 DESCRICAO JUMBOTRON -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Professores</h1>
                <p class="lead">Abaixo são exibidos os professores cadastrados no site:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Informações
                            <div class="float-end"> <a href="insertProfessor.php" class="btn btn-primary">Adicionar Professor</a> </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderedtable-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Formação</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Valor p/Hora</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 

                            $sql = "SELECT * FROM professor";
                            $execComando = mysqli_query($conexao, $sql);
                            if (mysqli_num_rows($execComando) > 0)
                            {
                                foreach ($execComando as $professor)
                                {?>
                                    <tr>
                                        <td><?= $professor['cod_professor']; ?></td>
                                        <td><?= $professor['nome']; ?></td>
                                        <td><?= $professor['cpf']; ?></td>
                                        <td><?= $professor['formacao']; ?></td>
                                        <td><?= $professor['email']; ?></td>
                                        <td><?= $professor['telefone']; ?></td>
                                        <td><?= $professor['valor']; ?></td>
                                        <td><img src="<?= 'img/'.$professor['foto']; ?>" width="60px"></td>
                                        <td><a href="visualizarProfessor.php?id=<?= $professor['cod_professor']; ?>" class="btn btn-info btn-sm">Visualizar</a>
                                            <a href="editarProfessor.php?id=<?= $professor['cod_professor']; ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="crudProfessor.php" method="POST" class="d-inline">
                                                <button type="submit" name="deletar_professor" value="<?= $professor['cod_professor']; ?>" class="btn btn-danger btn-sm">Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                                } 
                                else 
                                {
                                    echo "<h5> Nenhum professor cadastrado </h5>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</html>