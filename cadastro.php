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
        $db = mysqli_connect("localhost", "root", "");
        if (!$db) {
            die('<h2>Erro no servidor!</h2>');
        }

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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>      

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo_cadastro.css">
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
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-whatsapp-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="cadastro.php">
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
                        <input type="number" class="telefone form-control" name="telefone" placeholder="Telefone" data-mask="(00) 0 0000-0000" autocomplete="off" max="16" required>
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
                        <input type="password" class="form-control" name="pass" placeholder="Senha" maxlength="40" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <select id="classe">
                            <option>Professor</option>
                            <option>Aluno</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" value="Criar" class="btn float-right login_btn">
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Já tem uma conta?<a href="login.php">Entrar</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
