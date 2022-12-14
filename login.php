<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['tipo'])) {
        include "sql/ConBD.php";

        if (empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['tipo'])) {
            mysqli_close($db);
            header('Location: login.php');
            die('<h2>Erro do cliente: Campos vazios!</h2>');
        }

        $password = mysqli_real_escape_string($db, $_POST['pass']);
        $username = mysqli_real_escape_string($db, $_POST['user']);

        if($_POST['tipo'] == 'a') {
            $query = "SELECT * FROM usuario WHERE username = '" . $username . "'";
            $numrow = 2;
            $utype = true;
        }elseif($_POST['tipo'] == 'p'){
            $query = "SELECT * FROM professor WHERE nome = '" . $username . "'";
            $numrow = 6;
            $utype = false;
        }else die('<h2>Erro no tipo.</h2>');

        $res = mysqli_query($db, $query);

        if (!$res) {
            die('<h2>Error na querry:' . $db->error . '</h2>');
        }

        if ($res->num_rows == 0) {
            die('<h2>Conta inexistente!</h2>');
        }

        $row = mysqli_fetch_row($res);

        if ($row[$numrow] === $password) {
            $_SESSION['uid'] = $row[0];
            $_SESSION['utype'] = $utype;
            $_SESSION['uname'] = $username;
            header('Location: home.php');
            echo "<h2>Login feito com sucesso!</h2>";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" defer></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js" defer></script>

    <script src="scripts/global.js" defer></script>

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

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <select name="tipo">
                            <option value="a">Aluno</option>
                            <option value="p">Professor</option>
                        </select>
                    </div>
                    
                    <div class="row align-items-center remember">
                        <input type="checkbox" name="lm">Lembrar-se de mim
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
                  <a href="cadastro_prof.php">Professor   </a><a>  ou </a><a href="cadastro.php">Aluno</a>
                  
                </div>


            </div>
        </div>
    </div>
</div>
</body>
</html>
