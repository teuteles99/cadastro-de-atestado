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
				<li class="active"><a href="http://localhost/local_atestado/consulta.php">Consultar atestado</a></li>
				<li><a href="http://localhost/local_atestado/novo_usuario.php">Novo Usuário</a></li>
				<li><a href="http://localhost/local_atestado/configuracoes_usuario.html">Configurações</a></li>
				<li class="sair"><a href="http://localhost/local_atestado/">Sair</a></li>
			</ul>
		</div>
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar">

		<h2>Consultar Local do Atestado</h2>
		<h3>Pesquisar</h3>
		<input type="text" name="pesquisar" onsize=""/>
        <button type="submit">Pesquisar</button>
        </form>

        <!--Exibição dos atestados relacionados ao funcionário-->
        <?php
            //Criar a conexao
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $dbname = "sistema_atestado";            
            $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

            //Capturar a pesquisa feita pelo usuário.
            if($_POST){
                $pesquisar = $_POST['pesquisar'];            

                $busca_funcionario = mysqli_query($conn, "SELECT `id_funcionario`, `nome_funcionario` FROM `funcionario` WHERE nome_funcionario LIKE '$pesquisar%'");
                $row = mysqli_fetch_assoc($busca_funcionario);
                $nome = $row['nome_funcionario'];
                $id = $row['id_funcionario'];
                //echo "Nome: $nome";
                //echo "ID: $id";
                //echo "SELECT `id_funcionario`, `nome_funcionario` FROM `funcionario` WHERE nome_funcionario LIKE '%$pesquisar%'";

                $busca_atestado = mysqli_query($conn, "SELECT `local_destino`, `tipo_atestado`FROM `atestado` WHERE id_funcionario = '$id'"); 
                
                //Exibe o resultado da pesquisa
                if($pesquisar == null || $nome == null){
                    echo "Nenhum atestado encontrado";
                }else{
                    while($row_atestado = mysqli_fetch_assoc($busca_atestado))
                    {
                        $classificacao_atestado_id = $row_atestado['tipo_atestado'];
                        $busca_classificacao_atestado = mysqli_query($conn, "SELECT `classificacao_atestado` FROM `classificacao` WHERE classificacao_atestado_id = '$classificacao_atestado_id'");
                        $row_classificacao_atestado = mysqli_fetch_assoc($busca_classificacao_atestado);
                        
                    ?><a href="http://localhost/local_atestado/index.html" target = "_blank"><?php
                    
                        echo "Local de Destino: ".$row_atestado['local_destino']." ";
                        echo "Classificação do Atestado: ".$row_classificacao_atestado['classificacao_atestado']."<br>";
                        echo "Nome: $nome"."<br><br>";

                    ?></a><?php
                    }
                }
            }
            mysqli_close($conn);            
        ?>
        
	</body>

</html>