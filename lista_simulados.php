<?php
session_start();
If(!isset($_SESSION['uid']) || !isset($_SESSION['utype']) || !isset($_SESSION['uname'])){
    header('Location: About/');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/estilo_pesquisar.css" rel="stylesheet">
    <script src="scripts/global.js" defer></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Simulados</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">
                    <h3>Simulados
                        <a href="home.php" class="btn btn-danger float-end">VOLTAR</a>
                    </h3>
                </div>
            </div>
            <br>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Questões</th>
                    <th>Professor</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "sql/ConBD.php";

                $query_run = mysqli_query($db, "SELECT simulado.id AS ID, simulado.nome AS Nome, simulado.descricao AS Des, count(quest_sim.opt1) AS NQ, professor.nome AS Prof FROM simulado LEFT JOIN professor ON simulado.cod_prof_fk = professor.cod_professor LEFT JOIN quest_sim ON quest_sim.sim_id = simulado.id GROUP BY quest_sim.sim_id");

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as
                            $card)
                    {
                        ?>
                        <tr>
                            <td><?= $card['Nome']; ?></td>
                            <td><?= $card['Des']; ?></td>
                            <td><?= $card['NQ']; ?></td>
                            <td><?= $card['Prof']; ?></td>
                            <td><a href="simulado.php?id=<?= $card['ID']; ?>" class="btn btn-info">Iniciar</a></td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    echo "<h5 style='color: #b7b7b7'> Nenhum simulado cadastrado </h5>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootst
rap.bundle.min.js"></script>

</body>
</html>

