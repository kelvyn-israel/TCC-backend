<?php

		include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

	$conn = mysqli_connect("localhost", "root", "", "tcc");

	//String de conexão associada a variavel $conn

	if($conn){
		echo "";
	}else{
		echo "Falha na conexão!";
	}
	//Verifica se está conectado
	//Made By Kelvyn Israel
	//kelvyn.teixeira@etec.sp.gov.br

?>