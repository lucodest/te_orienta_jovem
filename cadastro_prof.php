<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {

//polyfill
    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle)
        {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }

    if (isset($_POST['user']) && isset($_POST['cpf']) && isset($_POST['formac']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['pass']) && isset($_POST['val'])) {
        $db = mysqli_connect("localhost", "root", "");
        if (!$db) {
            die('<h2>Erro no servidor!</h2>');
        }

        if (empty($_POST['user']) || empty($_POST['cpf']) || empty($_POST['formac']) || empty($_POST['email']) || empty($_POST['tel']) || empty($_POST['pass']) || empty($_POST['val'])) {
            mysqli_close($db);
            die('<h2>Erro do cliente: Campos vazios!</h2>');
        }

        //segurançaaaa
        if (str_contains($_POST['user'], "'") || str_contains($_POST['cpf'], "'") || str_contains($_POST['formac'], "'") || str_contains($_POST['email'], "'") || str_contains($_POST['tel'], "'") || str_contains($_POST['pass'], "'") || str_contains($_POST['val'], "'")) {
            mysqli_close($db);
            die('<h2>Erro do cliente!</h2>');
        }

        mysqli_select_db($db, "te_orienta_joven");
        $res = mysqli_query($db, "INSERT INTO professor VALUES (NULL, '" . $_POST['user'] . "','" . $_POST['cpf'] . "','" . $_POST['formac'] . "','" . $_POST['email'] . "','" . $_POST['tel'] ."','" . $_POST['pass'] ."','" . $_POST['val'] ."','');");
        if ($res) {
            header('Location: pesquisar.php');
            echo "<h2>Cadastrado com sucesso!</h2>";
        } else {
            die('<h2>Error na querry:' . $db->error . '</h2>');
        }

        mysqli_close($db);
    } else {
        die("<h2>Error: Requisição invalida</h2>");
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro professor</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" defer></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js" defer></script>

    <script src="scripts/global.js" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo_professores.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-center">
                    <img src="img/Logotipo.png" alt=""><br>
                </div><br>
                <h1></h1>
                <h3>Cadastre-se:</h3>
                
            </div>
            <div class="card-body">
                <form method="post" action="cadastro_prof.php">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="user" placeholder="Nome de Usuario" maxlength="50" required>

                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="cpf" class="form-control" name="cpf" placeholder="CPF" required>

                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="formac" placeholder="Formação" maxlength="100" required>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                         <input type="text" name="email" class="form-control"  placeholder="Email" />
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" id="tel" class="telefone form-control" name="tel" placeholder="Telefone" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="pass" placeholder="Senha" maxlength="20" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Confirmar senha" maxlength="40" required>
                    </div>
            

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="number" class="form-control" name="val" placeholder="Valor" min="0" max="2000" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Criar" class="btn float-right login_btn">
                    </div>

                </form>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
window.onload = function(){
    $("#tel").inputmask({"mask": "(99) 99999-9999"});
    $("#cpf").inputmask({"mask": "999.999.999-99"});
}
</script>
</html>
