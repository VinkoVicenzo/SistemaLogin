<!DOCTYPE html>
<html lang="pt/br">
<head>
    <meta charset="UTF-8">
    <meta author="Vinko Vicenzo Tomljanovie">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Logado</title>
</head>
<body>
</body>
</html>

<?php 

$email = "cimol@gmail.com";
$senha = "123456";

$validacao_email = $_POST['email'];
$validacao_senha = $_POST['password'];

$file = fopen("dados.txt","a+");

    if($validacao_senha == $senha and $validacao_email == $email){
        $_SESSION['logado'] = true; ?>
        <div id="logout" role="alert"><p>Login efetuado com sucesso!</p> <br><a href="?logout">Fazer Logout</a>
        </div>
        <?php
        $criptografia = base64_encode($validacao_senha);
        fwrite($file,"|".$validacao_email."|".$criptografia."\r\n");
    }

    elseif(!isset($_SESSION['logado'])){
        header("Location: index.php");
    }

    fclose($file);
    session_destroy();
?>