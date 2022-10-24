<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
//polyfill
    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle)
        {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $db = mysqli_connect("localhost", "root", "");
        if (!$db) {
            die('<h2>Erro no servidor!</h2>');
        }
        mysqli_select_db($db, "te_orienta_joven");

        if (empty($_POST['user']) || empty($_POST['pass'])) {
            mysqli_close($db);
            header('Location: login.php');
            die('<h2>Erro do cliente: Campos vazios!</h2>');
        }

        //segurançaaaa
        if (str_contains($_POST['user'], "'") || str_contains($_POST['pass'], "'")) {
            mysqli_close($db);
            header('Location: login.php');
            die('<h2>Erro do cliente!</h2>');
        }

        $res = mysqli_query($db, "SELECT * FROM usuario WHERE username = '" . $_POST['user'] . "'");
        if (!$res) {
            die('<h2>Error na querry:' . $db->error . '</h2>');
        }

        if ($res->num_rows == 0) {
            die('<h2>Conta inexistente!</h2>');
        }

        $row = mysqli_fetch_row($res);

        if ($row[2] === $_POST['pass']) {
            header('Location: home.html');
            die("<h2>Login feito com sucesso!</h2>");
            //deu bom
        } else {
            die("<h2>Senha incorreta!</h2>");
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
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo_login.css">
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
                <h3>Login:</h3>
                
            </div>
            <div class="card-body">
                <form method="POST" action="login.php">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="user" class="form-control" placeholder="Usuario" maxlength="50" required>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="pass" class="form-control" placeholder="Senha" maxlength="40" required>
                    </div>
                    
                    <div class="row align-items-center remember">
                        <input type="checkbox">Lembrar-se de mim
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn float-right login_btn">
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Esqueceu sua senha?</a>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    <a>Não tem uma conta? Cadastre-se</a><br>
                    
                </div>

                <div class="card-footer">
                <div class="d-flex justify-content-center links">
                  <a href="cadastro.php">Professor   </a><a>  ou </a><a href="cadastro.php">Aluno</a>
                  
                </div>


            </div>
        </div>
    </div>
</div>
</body>
</html>
