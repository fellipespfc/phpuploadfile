<?php
session_start();//Inicialize BD

//Connection with BD
include_once("conection.php");

//dates
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

//read file
$dados = file($arquivo_tmp); 

//read dates of array
foreach($dados as $linha){
	//Remove white spaces from begin and end of string
	$linha = trim($linha);

	//Put in Array itens separed with ","
	$valor = explode(',', $linha);
	
	//Variabless
	$nome = $valor[0];
	$email = $valor[1];
	$usuario = $valor[2];
	$senha = $valor[3];
	
	//Insert into tabçe
	$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES ('$nome', '$email', '$usuario', '$senha')";
	
	//Execute command in MySQLi
	$resultado_usuario = mysqli_query($conn, $result_usuario);	
}

//Create Variable with message
$_SESSION['msg'] = "<p style='color: green;'>Carregado os dados com sucesso!</p>";

//Redirect user for page index
header("Location: index.php");