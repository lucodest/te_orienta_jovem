<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {

//polyfill
    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle)
        {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }

    if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['tel']) && isset($_POST['email'])) {
        include "sql/ConBD.php";

        if (empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['tel']) || empty($_POST['email'])) {
            mysqli_close($db);
            //header('Location: cadastro.php');
            die('<h2>Erro do cliente: Campos vazios!</h2>');
        }

        //segurançaaaa
        if (str_contains($_POST['user'], "'") || str_contains($_POST['pass'], "'") || str_contains($_POST['tel'], "'") || str_contains($_POST['email'], "'")) {
            mysqli_close($db);
            //header('Location: cadastro.php');
            die('<h2>Erro do cliente!</h2>');
        }

        mysqli_select_db($db, "te_orienta_joven");
        $res = mysqli_query($db, "INSERT INTO usuario VALUES (NULL, '" . $_POST['user'] . "','" . $_POST['pass'] . "','" . $_POST['tel'] . "','" . $_POST['email'] . "');");
        if ($res) {
            header('Location: login.php');
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
    <title>Cadastro</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" defer></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js" defer></script>

    <script src="scripts/global.js" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo_cadastro.css">
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
                <form method="post" action="cadastro.php" onsubmit="return confSenha()">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="user" placeholder="Nome de Usuario" maxlength="50" required>

                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="telefone form-control" name="tel" id="tel" placeholder="Telefone" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email" maxlength="50" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="sen" class="form-control" name="pass" placeholder="Senha" maxlength="40" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="sen2" class="form-control" placeholder="Confirmar senha" maxlength="40" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Criar" class="btn float-right login_btn">
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    <a>Já tem uma conta? Entre</a>
                </div>
                <div class="card-footer">
                <div class="d-flex justify-content-center links">
                  <a href="cadastro_prof.php">Professor   </a><a>  ou </a><a href="cadastro.php">Aluno</a>
                  
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    window.onload = function(){
        $("#tel").inputmask({"mask": "(99) 99999-9999"});
    }
</script>
</html>
