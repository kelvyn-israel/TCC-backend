<?php
	include_once "conect.php";
	//Inclui o arquivo de conexao ao banco de dados
		include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

	$id = $_POST['id'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	//Recebe os dados vindo do formulario
	$ok = true;
	//variavel de controle

		if(strlen(trim($email))==0){
			echo "<script>alert('Informe os dados solicitados!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
		if(strlen(trim($telefone))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
		if(strlen(trim($id))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}

			//Verifica se os campos foram preenchidos
		if($ok){
			$sql = mysqli_query($conn, "UPDATE email SET email = '$email' WHERE id_motorista = '$id' ");
				//Executa o primeiro update
				if($sql){
					$sql1 = mysqli_query($conn, "UPDATE telefone SET telefone = '$telefone' WHERE id_motorista = '$id' ");
						//Se o primeiro update for executado,esecuta o seguinte
			}else{
				echo "<script>alert('Falha ao atualizar os dados!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
					//Exibe uma mensagem caso nao seja executado o update
		}
		if($sql1){
			echo "<script>alert('Dados atualizados com sucesso! Por favor,faça login novamente!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=logout.php'>";
					//Exibe outra mensagem caso o update senha sido executado e redireciona o usuario para logar novamente
		}else{
			echo "<script>alert('Falha em atualizar os dados!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
					//Exibe um alert de erro e redireciona o usuario para a pagina de perfil

		}
	}
		$conn = null;
			//Fecha a conexao com o banco

			//Made By Kelvyn Israel
			//kelvyn.teixeira@etec.sp.gov.br

?>