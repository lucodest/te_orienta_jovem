<?php
//polyfill
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['tel']) && isset($_POST['email'])){
	$db = mysqli_connect("localhost", "root", "");
	if(!$db){
		die('<h2>Erro no servidor!</h2>');
	}
	
	if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['tel']) || empty($_POST['email'])){
		mysqli_close($db);
		//header('Location: index2.html');
		die('<h2>Erro do cliente: Campos vazios!</h2>');
	}
	
	//segurançaaaa
	if(str_contains($_POST['user'], "'") || str_contains($_POST['pass'], "'") || str_contains($_POST['tel'], "'") || str_contains($_POST['email'], "'")){
		mysqli_close($db);
		//header('Location: index2.html');
		die('<h2>Erro do cliente!</h2>');
	}
	
	mysqli_select_db($db, "te_orienta_joven");
	$res = mysqli_query($db, "INSERT INTO usuario VALUES (NULL, '".$_POST['user']."','".$_POST['pass']."','".$_POST['tel']."','".$_POST['email']."');");
	if($res){
		header('Location: index.html');
		echo "<h2>Cadastrado com sucesso!</h2>";
	}else{
		die('<h2>Error na querry:'.$db->error.'</h2>');
	}
	
	mysqli_close($db);
}else{
	echo "<h2>Error: Requisição invalida</h2>";
}

?>