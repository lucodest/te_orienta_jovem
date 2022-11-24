<?php
session_start();
If(!isset($_SESSION['uid']) || !isset($_SESSION['utype']) || !isset($_SESSION['uname'])){
    header('Location: About/');
    die();
}
if(isset($_GET['logoff'])){
    session_unset();
    session_destroy();
    header('Location: About/');
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="scripts/global.js" defer></script>

	<meta charset="UTF-8">
	<title>Início</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo_inicio.css">
</head>
<body class="text-center">
<h1>Te orienta jovem</h1><br>
<div id="userbox"><span><?php echo $_SESSION['uname']; ?>   </span><a href="home.php?logoff">Sair</a></div>
<div class="container">
	<div class="row">
		<div class="col">
			<img src="img/material.png">
			<h2>Materiais</h2>
		</div>
		<div class="col">
			<img src="img/cursos.png">
			<h2>Cursos</h2>
		</div>
		<div class="col" onclick="window.location.pathname = 'te_orienta_jovem/pesquisar.php'"> <!--DEBUG -->
			<img src="img/aula.png">
			<h2>Professores</h2>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<img src="img/calendario.png">
			<h2>Calendario</h2>
		</div>
		<div class="col">
			<img src="img/suporte.png">
			<h2>Teste vocacional</h2>
		</div>
		<div class="col" onclick="window.location.pathname = 'te_orienta_jovem/lista_simulados.php'">
			<img src="img/simulados.png">
			<h2>Simulados</h2>
		</div>
	</div>
</div>

</body>