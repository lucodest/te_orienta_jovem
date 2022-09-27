<?php
//polyfill
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if(isset($_POST['user']) && isset($_POST['pass'])){
	$db = mysqli_connect("localhost", "root", "");
	if(!$db){
		die('<h2>Erro no servidor!</h2>');
    }
    mysqli_select_db($db, "te_orienta_joven");
	
	if(empty($_POST['user']) || empty($_POST['pass'])){
		mysqli_close($db);
		header('Location: login.html');
		die('<h2>Erro do cliente: Campos vazios!</h2>');
	}
	
	//segurançaaaa
	if(str_contains($_POST['user'], "'") || str_contains($_POST['pass'], "'")){
		mysqli_close($db);
		header('Location: login.html');
		die('<h2>Erro do cliente!</h2>');
	}
	
    $res = mysqli_query($db, "SELECT * FROM usuario WHERE username = '".$_POST['user']."'");
	if(!$res){
		die('<h2>Error na querry:'.$db->error.'</h2>');
    }
    
    if($res->num_rows == 0){
        die('<h2>Conta inexistente!</h2>');
    }

    $row = mysqli_fetch_row($res);

    if($row[2] === $_POST['pass']){
		header('Location: home.html');
        echo "<h2>Login feito com sucesso!</h2>";
        //deu bom
    }else{
        echo "<h2>Senha incorreta!</h2>";
    }

	mysqli_close($db);
}else{
	echo "<h2>Error: Requisição invalida</h2>";
}
?>