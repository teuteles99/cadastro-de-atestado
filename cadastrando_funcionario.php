<?php
           
    $matricula_funcionario = $_POST['matricula'];
    $nome_funcionario = $_POST['nome'];
    $coordenador = $_POST['coordenador'];
    $coordenador = array_key_exists('coordenador', $_POST) ? 1 : 0;    
    $email = $_POST['email'];

    //Criar a conexao
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "sistema_atestado";            
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die('Erro ao conectar ao banco de dados');    
        
    //generatePassword();
    $verifica_matricula = mysqli_query($conn, "SELECT 'id_funcionario' From funcionario WHERE matricula_funcionario = '$matricula_funcionario'");
    $row = mysqli_fetch_assoc($verifica_matricula);
    $id = $row['id_funcionario'];
    if($id == null){

        //Gerador de senha
        function generatePassword($qtyCaraceters = 8)
        {
        //Letras minúsculas embaralhadas
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
    
        //Letras maiúsculas embaralhadas
        $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    
        //Números aleatórios
        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;
    
        //Caracteres Especiais
        $specialCharacters = str_shuffle('!@#$%*-');
    
        //Junta tudo
        $characters = $capitalLetters.$smallLetters.$numbers.$specialCharacters;
    
        //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
        $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
    
        //Retorna a senha
        return $password;
        }
        
        //Enviar para o email
        $senha_funcionario = generatePassword();
        $to = $email;
        $subject = "Cadastro de funcionário";
        $body = "
        <html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <p>Bem-vindo <b>$nome_funcionario</b> ao Sistema Atestado - Prodeb<br>
        Sua nova senha de acesso é: <b>$senha_funcionario</b>
        </p>
        </body>
        </html>       
        ";
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: Sistema Atestado - Prodeb <matheus.jesus@prodeb.ba.gov.br>' . "\r\n";
        $headers .= 'Content-type: text/html; charset="utf-8"' . "\r\n"; 

        mail($to, $subject, $body, $headers);
        
        $dados_usuario = "INSERT INTO funcionario VALUES ('', '$nome_funcionario', '$matricula_funcionario', '$senha_funcionario', '$coordenador')";
        mysqli_query($conn, $dados_usuario) or die("Erro ao tentar cadastrar funcionario");
        echo "Funcionário cadastrado com sucesso!";
    }else{
        echo "Funcionário já cadastrado!";
    }    

    mysqli_close($conn);
?>
<meta http-equiv="refresh" content="1; http://localhost/local_atestado/novo_usuario.php">