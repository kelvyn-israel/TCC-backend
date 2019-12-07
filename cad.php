<?php
	
	include_once "conect.php";
	//inclui o arquivo de conexao
		include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	$gen = $_POST['genero'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$rua = $_POST['rua'];
	$cep = $_POST['cep'];
	$cnh = $_POST['hab'];
	$marca = $_POST['caminhao'];
	$modelo = $_POST['modelo'];
	$fab = $_POST['ano'];
	$carroc = $_POST['carro'];
	$carga = $_POST['carga'];
	$user= $_POST['login'];
	$senha = $_POST['senha'];
	//Recebe os dados vindos do fomulario
	$ok = true;
	//Variavel de controle

	$pass = sha1($senha);
	//Criptografa a senha vinda do formulario (essa senha será salva no banco)
	/*var_dump($pass);

	echo '<pre>';
	var_dump($_POST);
	echo '</pre>';*/
	//Verificando quais dados foram passados pelo formulario

		if(strlen(trim($nome))==0){
			echo "<script>alert('Informe os dados solicitados!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
			if(strlen(trim($idade))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
				$ok = false;
			}
		if(strlen(trim($cpf))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
			if(strlen(trim($email))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
				$ok = false;
			}
		if(strlen(trim($telefone))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
			if(strlen(trim($estado))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
				$ok = false;
			}
		if(strlen(trim($cidade))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
			if(strlen(trim($rua))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
				$ok = false;
			}
		if(strlen(trim($cep))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
			if(strlen(trim($cnh))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
				$ok = false;
			}
		if(strlen(trim($marca))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
			if(strlen(trim($modelo))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
				$ok = false;
			}
		if(strlen(trim($fab))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
			if(strlen(trim($carroc))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
				$ok = false;
			}
		if(strlen(trim($carga))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
			if(strlen(trim($user))==0){
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
				$ok = false;
			}
		if(strlen(trim($senha))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$ok = false;
		}
		//Verifica se todos os campos foram corretamente preenchidos

		if($ok){
		// rs = result set
		$rs = mysqli_query($conn, "INSERT INTO motorista(idMotorista, nome, genero, idade, cnh, cpf, login, senha) VALUES ('null', '$nome', '$gen', '$idade', '$cnh', '$cpf', '$user', '$pass')");
		//Comando acima executa a primeira query, de inserção na tabela motorista
		if($rs){
			$idMotorista = mysqli_insert_id($conn);

			$query1 = mysqli_query($conn, "INSERT INTO email(idEmail, email, id_motorista) VALUES('null', '$email', '$idMotorista')");
			$query2 = mysqli_query($conn, "INSERT INTO telefone(idTelefone, telefone, id_motorista) VALUES('NULL', '$telefone', '$idMotorista')");
			$query3 = mysqli_query($conn, "INSERT INTO local(idLocal, estado, cidade, rua, cep, id_motorista) VALUES('null', '$estado', '$cidade', '$rua', '$cep', '$idMotorista')");
			$query4 = mysqli_query($conn, "INSERT INTO caminhao(idCaminhao, marca, capacidade, ano, modelo, tipoCarroceria, id_motorista) VALUES('null', '$marca', '$carga', '$fab', '$modelo', '$carroc', '$idMotorista')");
		//Executa os outros inserts, cada um em sua devida tabela
		}
	}
		if($query4){
			echo "<script>alert('Dados salvos com sucesso!')</script>"
				. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
		}else{
			echo "<script>alert('Falha em salvar os dados!')</script>"
			. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=cad_vendedor.php'>";
			$conn = null;
		//Verifica se a ultima query foi executada, e exibe uma mensagem caso verdadeiro e outra caso falso
		//Em ambos os casos volta pra index.html
	}


	//Made By Kelvyn Israel
	//kelvyn.teixeira@etec.sp.gov.br
?>