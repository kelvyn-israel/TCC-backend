<?php
	
		include_once "error.php";
	//inclui o arquivo pra ocultar os erros (variaveis vazias,por exemplo)

	session_start();
	//Inicia a sessão

	if(!empty($_SESSION['senha']) and !empty($_SESSION['login'])){
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
    	session_destroy();
    	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
    	//O codigo acima destroi a sessao e todos os dados do usuario e redireciona para a index
}
	//Made By Kelvyn Israel
	//kelvyn.teixeira@etec.sp.gov.br

?>