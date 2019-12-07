<?php

	include_once "conect.php";
		//Inclui o arquivo de conexao ao banco
		include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

	$id = $_POST['id'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
		//Recbe os dados vindos do form
	$ok = true;
		//Variavel de controle
	$pass = sha1($senha);
		//Criptografa a senha antes de salvar no banco

			if(strlen(trim($login))==0){
				echo "<script>alert('Informe os dados solicitados!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
			if(strlen(trim($pass))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
			if(strlen(trim($id))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
				//Varifica o preenchimento dos campos do formulario

				if($ok){
			$sql = mysqli_query($conn, "UPDATE motorista SET login = '$login', senha = '$pass' WHERE idMotorista = '$id' ");
				//Executa o update junto ao banco de dados
				if($sql){
					echo "<script>alert('Dados atualizados com sucesso! Por favor,faça login novamente!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=logout.php'>";
					//Se a query sql for executada com sucesso exibe uma mensagem e direciona pra logar-se novamente
			}else{
					echo "<script>alert('Falha ao atualizar os dados!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
					//Se a query falhar exibe uma mensagem e redireciona o usuario para o perfil
			}
		}
			$conn = null;
				//Fecha a conexao com o banco


					//Made By Kelvyn Israel
					//kelvyn.teixeira@etec.sp.gov.br
?>