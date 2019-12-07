<?php

	include_once "conect.php";
	//inclui o arquivo de conexao
	include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

	session_start();
	//Inicia a sessao de usuário

	$user = $_POST['user'];
	$pass = $_POST['senha'];
	//Recebe os dados do form
	$ok = true;
	//Variavel de controle

	$senha = sha1($pass);
	//Criptografa a senha
	//var_dump($senha);

		if(strlen(trim($user))==0){
			echo "<script>alert('Informe o nome de usuário!')</script>" .
			"<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
			$ok = false;
		}
		if(strlen(trim($senha))==0){
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
			$ok = false;
		}

		//Verifica se os campos foram preenchidos,executando uma ação específica caso nao tenham sido preenchido

		if($ok){
			$query1 = mysqli_query($conn, "SELECT * FROM motorista WHERE login = '$user' AND senha = '$senha' ");
		//Executa a consulta no banco 
			if($query1){
				foreach($query1 as $row){
					$row['idMotorista']; //Identificação do motorista usado pra alterar ou excluir algum dado/cadastro
					$row['nome'];
					$row['genero'];
					$row['idade'];
					$row['cnh'];
					$row['cpf'];
					$row['login'];//Nome de usuário
					$row['senha'];//Usada pra confirmação de atualização/exclusao de dados (NÃO deve ser exibida!!)
			//Traz os dados em forma de array

				$ident = $row['idMotorista'];
				$nome = $row['nome'];
				$gen = $row['genero'];
				$idade = $row['idade'];
				$cnh = $row['cnh'];
				$cpf = $row['cpf'];
				$usuario = $row['login'];
				$password = $row['senha'];
			//Associa as devidas posicoes do array ao dado que ele representa
				}
			}

		if($user == $usuario and $senha == $password){
			$_SESSION['idMotorista'] = $ident;
			$_SESSION['nome'] = $nome;
			$_SESSION['genero'] = $gen;
			$_SESSION['idade'] = $idade;
			$_SESSION['cnh'] = $cnh;
			$_SESSION['cpf'] = $cpf;
			$_SESSION['login'] = $usuario;
			$_SESSION['senha'] = $password;
			//Associa as variaveis à variavel global "$_SESSION"
		$query2 = mysqli_query($conn, "SELECT email FROM email WHERE id_motorista = '$ident' ");
				if($query2){
					foreach($query2 as $row){
						$row['email'];
						$mail = $row['email'];
						$_SESSION['email'] = $mail;
					}
		$query3 = mysqli_query($conn, "SELECT telefone FROM telefone WHERE id_motorista = '$ident' ");
				if($query3){
					foreach($query3 as $row){
						$row['telefone'];
						$tel = $row['telefone'];
						$_SESSION['telefone'] = $tel;
					}
		$query4 = mysqli_query($conn, "SELECT estado, cidade, rua, cep FROM local WHERE id_motorista = '$ident' ");
				if($query4){
					foreach($query4 as $row){
						$row['estado'];
						$row['cidade'];
						$row['rua'];
						$row['cep'];
						$estado = $row['estado'];
						$cidade = $row['cidade'];
						$rua = $row['rua'];
						$cep = $row['cep'];
						$_SESSION['estado'] = $estado;
						$_SESSION['cidade'] = $cidade;
						$_SESSION['rua'] = $rua;
						$_SESSION['cep'] = $cep;
					}
		$query5 = mysqli_query($conn, "SELECT marca, capacidade, ano, modelo, tipoCarroceria FROM caminhao WHERE id_motorista = '$ident' ");
					foreach($query5 as $row){
						$row['marca'];
						$row['capacidade'];
						$row['ano'];
						$row['modelo'];
						$row['tipoCarroceria'];
						$marca = $row['marca'];
						$capacidade = $row['capacidade'];
						$ano = $row['ano'];
						$modelo = $row['modelo'];
						$tipoCarroceria = $row['tipoCarroceria'];
						$_SESSION['marca'] = $marca;
						$_SESSION['capacidade'] = $capacidade;
						$_SESSION['ano'] = $ano;
						$_SESSION['modelo'] = $modelo;
						$_SESSION['tipoCarroceria'] = $tipoCarroceria;
						header('location:perfil.php');
						//Executa outros "select's", traz os dados em array, associa os dados à variáveis, cria as variaveis de sessão e direciona pra "pagina inicial.php" (caso os dados (usuario e senha) estejam corretos)
					}
				}
			}
		}
	}else{
		unset($_SESSION['idMotorista']);
		unset($_SESSION['nome']);
		unset($_SESSION['genero']);
		unset($_SESSION['idade']);
		unset($_SESSION['cnh']);
		unset($_SESSION['cpf']);
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		unset($_SESSION['email']);
		unset($_SESSION['telefone']);
		unset($_SESSION['estado']);
		unset($_SESSION['cidade']);
		unset($_SESSION['rua']);
		unset($_SESSION['cep']);
		unset($_SESSION['marca']);
		unset($_SESSION['capacidade']);
		unset($_SESSION['ano']);
		unset($_SESSION['modelo']);
		unset($_SESSION['tipoCarroceria']);
		echo "<script>alert('Usuário ou senha inválidos!')</script>" .
			"<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
						//Caso os dados (usuario e senha) não estejam certos o código acima é executado, destruindo TODAS as as variáveis de sessao e direcionando o usuário para a página index
	}
}
		$conn = null;
		//Encerra a conexao com o banco de dados


	//Made By Kelvyn Israel
	//kelvyn.teixeira@etec.sp.gov.br
	
?>