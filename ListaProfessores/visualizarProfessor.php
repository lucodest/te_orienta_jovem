<?php
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
        <link rel="stylesheet" type="text/css" href="estilo_professores.css">

        <title>Detalhes</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Dados do Professor <a href="cardListView.php" class="btn btn-danger float-end">VOLTAR</a></h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['cod_professor']))
                            {
                                $professor_id = mysqli_real_escape_string($conexao, $_GET['cod_professor']);
                                $sql = "SELECT * FROM professor WHERE cod_professor='$professor_id' ";
                                $query_run = mysqli_query($conexao, $sql);

                                if (mysqli_num_rows($query_run) > 0)
                                {
                                    $arma = mysqli_fetch_array($query_run);
                            ?>
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <p class="form-control">
                                            <?= $professor['nome']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CPF</label>
                                        <p class="form-control">
                                            <?= $professor['cpf']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Formação</label>
                                        <p class="form-control">
                                            <?= $professor['formacao']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?= $professor['email']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Telefone</label>
                                        <p class="form-control">
                                            <?= $professor['telefone']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Valor</label>
                                        <p class="form-control">
                                            <?= $professor['dinheiro']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Foto</label>
                                        <p class="form-control">
                                            <?= $professor['img']; ?>
                                        </p>
                                    </div>
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