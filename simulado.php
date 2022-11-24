<?php
session_start();
If(!isset($_SESSION['uid']) || !isset($_SESSION['utype']) || !isset($_SESSION['uname'])){
    header('Location: index.html');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simulado</title>
</head>
<body>
<?php
if(!isset($_GET['id'])){
    echo "<h2>Requisição invalida!</h2>";
    die();
}
$db = mysqli_connect("localhost", "root", "", "te_orienta_joven");
if (!$db) {
    die('<h2>Erro no servidor!</h2>');
}

$simId = mysqli_real_escape_string($db, $_GET['id']);
$result = mysqli_query($db, "SELECT * FROM simulado WHERE id = ".$simId);

if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    echo "<h1>".$row['nome']."</h1>";
    echo "<h3>".$row['descricao']."</h3>";

    $result = mysqli_query($db, "SELECT * FROM quest_sim WHERE sim_id = ".$simId);
    $counter = 0;
    foreach ($result as $row){
        ?>
        <div>
            <h2><?=$row['pergunta']?></h2>
            <label for="r1"><?=$row['opt1']?></label>
            <input type="radio" id="r1" name="res<?=$counter?>" value="1">
            <label for="r2"><?=$row['opt2']?></label>
            <input type="radio" id="r2" name="res<?=$counter?>" value="2">
            <label for="r3"><?=$row['opt3']?></label>
            <input type="radio" id="r3" name="res<?=$counter?>" value="3">
            <label for="r4"><?=$row['opt4']?></label>
            <input type="radio" id="r4" name="res<?=$counter?>" value="4">
            <label for="r5"><?=$row['opt5']?></label>
            <input type="radio" id="r5" name="res<?=$counter?>" value="5">
        </div>
        <?php
        $counter++;
    }
}else{
    echo "<h2>Simulado não existe!</h2>";
    die();
}
?>
</body>
</html>