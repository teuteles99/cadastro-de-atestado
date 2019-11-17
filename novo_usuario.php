<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Mina|Slabo+27px" rel="stylesheet">
	</head>

	<body>
		<div id="menu">
			<ul>
				<li><a href="http://localhost/local_atestado/cadastro.php">Cadastrar atestado</a></li>
                <li><a href="http://localhost/local_atestado/consulta.php">Consultar atestado</a></li>
                <li class="active"><a href="http://localhost/local_atestado/novo_usuario.php">Novo Usuário</a></li>
                <li><a href="http://localhost/local_atestado/configuracoes_usuario.html">Configurações</a></li>
				<li class="sair"><a href="http://localhost/local_atestado/">Sair</a></li>
			</ul>
		</div>
		
		<form name="cadastro_usuario" method="POST" action="cadastrando_funcionario.php">
			<h2>Cadastro de Usuário</h2>
            <div>
                <h3>Matrícula</h3>
                <input type="text" name="matricula" maxlength="8" required=""/>
            </div>
			<div>
				<h3>Nome do funcionário</h3>
				<input type="text" name="nome" required=""/>
			</div>
			<div>
                <h3>Email</h3>
                <input type="text" name="email" maxlength="" required=""/>
            </div>
			<div>
				<input type="checkbox" name="coordenador" value="true"/>Coordenador<br>
			</div>
			<!--<div>
				<h3>Senha</h3>
				<input type="password" name="senha"/>
            </div>-->
            <input type="submit" name="enviar" value="Enviar" />
			<!--<div>
				<button type="submit" name="enviar">
					Enviar
					<a href="http://localhost/local_atestado/cadastro.html"></a>
				</button>
			</div>-->
        </form>

	</body>

</html>