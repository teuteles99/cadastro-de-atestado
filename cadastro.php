<!DOCTYPE html>
<?php
	if ( $_POST ){
		mysql_connect('');
	}
?>
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
				<li class="active"><a href="http://localhost/local_atestado/cadastro.php">Cadastrar atestado</a></li>
				<li><a href="http://localhost/local_atestado/consulta.php">Consultar atestado</a></li>
				<li><a href="http://localhost/local_atestado/novo_usuario.php">Novo Usuário</a></li>
				<li><a href="http://localhost/local_atestado/configuracoes_usuario.html">Configurações</a></li>
				<li class="sair"><a href="http://localhost/local_atestado/">Sair</a></li>
			</ul>
		</div>
		<h2>Cadastro de Atestado</h2><br>
		<form name="cadastro_atestado" method="POST" action="cadastrando.php">
			<h2>Empregado</h2><input type="text" name="NomeFuncionario" required=""/>
			<h2>Matrícula</h2><input type="text" name="MatriculaFuncionario" size="" maxlength="8" required=""/><br>
			<h2>Tipo de Atestado</h2>
			<select name="TipoAtestado">
				<option>Selecione...</option>
				
				<?php
					$strcon = mysqli_connect('localhost','root','','sistema_atestado') or die('Erro ao conectar ao banco de dados');

      				$result_tipo_atestado = "SELECT * FROM classificacao";
      				$resultado_tipo_atestado = mysqli_query($strcon, $result_tipo_atestado);
      				while($row_tipo_atestado = mysqli_fetch_assoc($resultado_tipo_atestado)){ ?>
						<option value="<?php echo $row_tipo_atestado['classificacao_atestado_id']; ?>"><?php echo $row_tipo_atestado['classificacao_atestado']; ?>
						</option> <?php
					}
     			?>
				
			</select>
			
			<h2>Data</h2><input type="text" name="DataAtestado" size="" required=""/><br>
			<h2>Local de Destino</h2>
			<select name="LocalAtestado">
				<option>Selecione...</option>
				<option>Pasta 1</option>
				<option>Pasta 2</option>
			</select>
			<h2>Horário</h2><input type="text" name="HoraAtestado" size="" required=""/><br>
			<h2>Motivo</h2><input type="text" name="MotivoAtestado" size=""/><br>
			<input type="submit" name="enviar" value="Enviar" />
		</form>
		
	</body>

</html>