<?php
	
	include_once "conect.php";
		//Inclui arquivos de conexao ao banco
		include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

	$id = $_POST['id'];
	$cep = $_POST['cep'];
	$rua = $_POST['rua'];
	$cidade = $_POST['cidade'];
	$est = $_POST['estado'];
		//Recebe es dados do Formulario
	$ok = true;
		//Variavel de controle

		if(strlen(trim($est))==0){
			echo "<script>alert('Informe os dados solicitados!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
		if(strlen(trim($cidade))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
		if(strlen(trim($rua))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
		if(strlen(trim($cep))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
		if(strlen(trim($id))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=perfil.php'>";
			$ok = false;
		}
			//Verifica o preenchimento dos campos

		if($ok){
			$sql = mysqli_query($conn, "UPDATE local SET estado = '$est', cidade = '$cidade', rua = '$rua', cep = '$cep' WHERE id_motorista = '$id' ");
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