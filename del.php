<?php


	include_once "conect.php";
		//inclui a conexa ao banco
		include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

		$senha = $_POST['senha'];
		$id = $_POST['id'];
		$pass = sha1($senha);
		$sen = $_POST['password'];
			//Recebe os dados do formulario
		$ok = true;
			//Variavel de controle

		if(strlen(trim($senha))==0){
			echo "<script>alert('Informe a senha para continuar!')</script>" .
			"<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
		if(strlen(trim($id))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
			//Verifica o preenchimento do formulario

			if($pass == $sen){
				$sql1 = mysqli_query($conn, "DELETE FROM motorista WHERE idMotorista = '$id' ");
					//Executa o delete na tabela pai, quebrando as referencias
			}else{
				echo "<script>alert('Senha incorreta!')</script>" .
				"<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
					//Mensagem de erro caso a senha estiver errada
			}
			if($sql1){ 	
					$sql2 = mysqli_query($conn, "DELETE FROM email WHERE id_motorista = '$id' ");
					$sql3 = mysqli_query($conn, "DELETE FROM telefone WHERE id_motorista = '$id' ");
					$sql4 = mysqli_query($conn, "DELETE FROM local WHERE id_motorista = '$id' ");
					$sql5 = mysqli_query($conn, "DELETE FROM caminhao WHERE id_motorista = '$id' ");
				}
					//Executa os outros deletes, apenas se o primero ($sql1) retornar verdadeiro
					//Nao era necessario, mas achei melhor nao mexer :D
				if($sql5){
						echo "<script>alert('Cadastro excluído com sucesso!')</script>" .
							 "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
							 	//Verifica se o cadastro foi excluido,exibe uma mensagem de sucesso e redireciona pra index.php
				}else{
					echo "<script>alert('Falha ao excluir cadastro!')</script>" .
						 "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
						 	//Exibe uma mensagem caso o delete falhe e envia novamente ao perfil
				}

				$conn = null;
					//Fecha a conexao com o banco de dados

				//Made by Kelvyn Israel
				//kelvyn.teixeira@etec.sp.gov.br

?> 