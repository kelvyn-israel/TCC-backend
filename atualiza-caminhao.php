<?php
	include_once "conect.php";
		//Inclui o arquivo de conexao
		include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

	$id = $_POST['id'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$ano = $_POST['ano'];
	$carroceria = $_POST['carro'];
	$capacidade = $_POST['carga'];
		//Recebe os dados do form
	$ok = true;
		//Variavel de controle

			if(strlen(trim($marca))==0){
				echo "<script>alert('Informe os dados solicitados!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
			if(strlen(trim($modelo))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
			if(strlen(trim($ano))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
			if(strlen(trim($carroceria))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
			if(strlen(trim($capacidade))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
			if(strlen(trim($id))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
				$ok = false;
			}
				//Verifica o preenchimento correto do formulario

			if($ok){
			$sql = mysqli_query($conn, "UPDATE caminhao SET marca = '$marca', capacidade = '$capacidade', ano = '$ano', modelo = '$modelo', tipoCarroceria = '$carroceria' WHERE id_motorista = '$id' ");
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