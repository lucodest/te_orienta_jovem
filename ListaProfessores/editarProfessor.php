<?php
session_start();
require 'ConexaoBD.php';
?>

<!doctype html>
<html lang="pt-BR">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>

        <title>Editar</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Professor <a href="cardListView.php" class="btn btn-danger float-end">VOLTAR</a></h4>
                        </div>
                        <div class="card-body">

                            <?php
                            if (isset($_GET['id']))
                            {
                                $professor_id = mysqli_real_escape_string($conexao, $_GET['cod_professor']);
                                $sql = "SELECT * FROM professor WHERE cod_professor='$professor_id'";
                                $query_run = mysqli_query($conexao, $sql);

                                if (mysqli_num_rows($query_run) > 0)
                                {
                                    $professor = mysqli_fetch_array($query_run);
                                ?>

                                    <form action="crudProfessor.php" method="POST">
                                        <input type="hidden" name="professor_id" value="<?= $professor['cod_professor']; ?>">
                                        <div class="mb-3">
                                            <label>Nome</label>
                                            <input type="text" name="nome" value="<?= $professor['nome']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>CPF</label>
                                             <input type="number" name="cpf" value="<?= $professor['cpf']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Formação</label>
                                             <input type="text" name="formacao" value="<?= $professor['formacao']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                             <input type="email" name="email" value="<?= $professor['email']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Telefone</label>
                                             <input type="tel" name="telefone" value="<?= $professor['telefone']; ?>" class="telefone form-control" data-mask="(00) 0 0000-0000" placeholder="(00) 0 0000-0000">
                                        </div>
                                        <div class="mb-3">
                                            <label>Senha</label>
                                             <input type="pass" name="email" value="<?= $professor['senha']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Valor p/Hora</label>
                                             <input type="number" name="dinheiro" value="<?= $professor['dinheiro']; ?>" class="dinheiro form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Foto</label>
                                            <input type="file" name="img" value="<?= $professor['foto']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="editar_professor" class="btn btn-primary">Atualizar Informações</button>
                                         </div>
                                    </form>
                                <?php
                                } 
                                else 
                                {
                                    echo "<h4>Nenhum ID encontrado</h4>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>