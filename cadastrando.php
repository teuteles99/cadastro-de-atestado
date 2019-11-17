<?php
    $nome_funcionario = $_POST['NomeFuncionario'];
    $matricula_funcionario = $_POST['MatriculaFuncionario'];
    $tipo_atestado = $_POST['TipoAtestado'];
    $data_atestado = $_POST['DataAtestado'];
    $local_destino = $_POST['LocalAtestado'];
    $horario = $_POST['HoraAtestado'];
    $motivo = $_POST['MotivoAtestado'];
    $strcon = mysqli_connect('localhost','root','','sistema_atestado') or die('Erro ao conectar ao banco de dados');
    //Verifica se esta matricula existe e busca o id do funcionário responsável por ela.
    $busca_id = mysqli_query($strcon, "SELECT funcionario.id_funcionario FROM funcionario WHERE funcionario.matricula_funcionario = '$matricula_funcionario'");
    $total_registro = $busca_id->num_rows;
    $row = $busca_id->fetch_object();

    //var_dump($row->id_funcionario);
    if ($total_registro > 0){
        $sql = "INSERT INTO atestado VALUES ";
        $sql .= "('', '$tipo_atestado', '$data_atestado', '$local_destino', '$horario', '$motivo', '$row->id_funcionario')";
        mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar atestado");
        mysqli_close($strcon);                   
        echo "Atestado cadastrado com sucesso!";
        
    }else{
        echo "Atestado não cadastrado!";
    }
    
    //mysqli_close($conn); Fechar a conexão
?>
<meta http-equiv="refresh" content="1; http://localhost/local_atestado/cadastro.php">