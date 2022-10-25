<?php
//polyfill
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle)
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}
?>
<html lang="pt-BR">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/estilo_pesquisar.css" rel="stylesheet">
    <script src="scripts/global.js" defer></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detalhes do professor</title>
</head>
<body>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Pesquisa de professores
                        <a href="home.html" class="btn btn-danger float-end">VOLTAR</a>
                    </h3><br>
                    <form method="POST" action="pesquisar.php">
                        <input type="text" name="pesq" placeholder="Nome">
                        <input type="submit" value="Pesquisar">
                    </form>
                </div>
            </div>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Formação</th>
                    <th>E-mail</th>
                    <th>Valor</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $db = mysqli_connect("localhost", "root", "", "te_orienta_joven");
                if (!$db) {
                    die('<h2>Erro no servidor!</h2>');
                }

                if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pesq']) && !empty($_POST['pesq'])){
                    if(str_contains($_POST['pesq'], "'")){
                        mysqli_close($db);
                        die('<h2>Erro do cliente!</h2>');
                    }
                    $query = "SELECT * FROM professor WHERE nome LIKE '%".$_POST['pesq'] ."%'";
                }else{
                    $query = "SELECT * FROM professor";
                }

                $query_run = mysqli_query($db, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as
                            $card)
                    {
                        ?>
                        <tr>
                            <td><?=
                                $card['nome']; ?></td>
                            <td><?=
                                $card['formac']; ?></td>
                            <td><?=
                                $card['email']; ?></td>
                            <td><?=
                                $card['valor']; ?></td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    echo "<h5 style='color: #b7b7b7'> Nenhum professor cadastrado </h5>";
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

