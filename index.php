<?php
$conn = mysqli_connect("localhost", "root", "", "sistema_atestado") or die('Erro ao conectar ao banco de dados');			
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Mina|Slabo+27px" rel="stylesheet">
	</head>

	<body>
		<div id="menu">
			<ul>
				<!--<li><a href="http://localhost/local_atestado/cadastro.php">Cadastrar atestado</a></li>
				<li><a href="http://localhost/local_atestado/consulta.php">Consultar atestado</a></li>-->
				<li id="titulo"><a href="http://localhost/local_atestado/">SISTEMA ATESTADO - PRODEB</a></li>
				<li class="sair" ><a href="http://localhost/local_atestado/">Sair</a></li>
			</ul>
		</div>
		
		<form id="login" method="POST" action="?go=logar">
			<div class="container">
				<h2>Login</h2>
				<label for="matricula"><b>Matrícula</b></label>
				<input type="text" name="matricula" required="">
				<br>
				<label for="senha"><b>Senha</b></label>
				<input type="password" name="senha" required="">
				<br>
				<input type="submit" value="entrar" id="entrar" name="entrar"><br>
				<!--<label>
					<input type="checkbox" checked="checked" name="lembrar">
					Lembrar-me
				</label>-->
			</div>
			
        </form>
        
		<?php
			if(@$_GET['go'] == 'logar'){
				$user = $_POST['matricula'];
				$pwd = $_POST['senha'];

				if(empty($user)){
					echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
				}elseif(empty($pwd)){
					echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
				}else{
					$query1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM funcionario WHERE matricula_funcionario = '$user' AND senha = '$pwd'"));
					if($query1 == 1){
						echo "<script>alert('Usuário logado com sucesso.');</script>"; 
						echo "<meta http-equiv='refresh' content='0, url=./cadastro.php'>";
					}else{
						echo "<script>alert('Usuário e senha não correspondem.'); history.back();</script>";
					}
				}
			}

		?>
        
	</body>

</html>