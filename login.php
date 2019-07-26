<?php

include 'db.php';

// addslashes para proteger a escrita para senha, segurança
$usuario = addslashes($_POST['usuario']);
//$senha = addslashes($_POST['senha']);

// md5 criptografia 128bits para senhas
$senha = md5($_POST['senha']);

$query = "SELECT * FROM usuarios 
    WHERE usuario = '$usuario' AND senha = '$senha'";

# SQL Injection
// senha = x' or 1=1 or 'dfgsdf

$consulta = mysqli_query($conexao, $query);

if(mysqli_num_rows($consulta) == 1){

    session_start();
    $_SESSION['login'] = true;
    $_SESSION['usuario'] = $usuario;

    header('location:index.php');
}
else {
    header('location:index.php?erro');
}
