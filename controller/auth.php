<?php

session_start();
$query =  "select * from usuario where login = '".$_POST['usuario']."' and senha = '".$_POST['senha']."';";

$connect = mysqli_connect('localhost', 'root', '0000','controle-usuarios','3306');
$result = mysqli_query($connect,$query);

if(mysqli_num_rows($result) == 1){

    $rows = mysqli_fetch_array($result);
    $_SESSION['nomeusuario'] = $rows['nomeusuario'];
    $_SESSION['usuario'] = $rows['login'];
    $_SESSION['senha'] = $rows['senha'];

    echo "
		<script>
			alert('Bem vindo, amiguinho ".$_SESSION['nomeusuario']. "');
			window.location = '../view/index.php';
		</script>
	";
} else {
    unset ($_SESSION['idusuario']);
    unset ($_SESSION['usuario']);
    unset ($_SESSION['senha']);

    echo "
		<script>
			alert('Usuário ou senha inválida');
			window.location = '../view/login.php';
		</script>
	";
}
