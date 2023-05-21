<?php

include('configphp.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1){

        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];


        header("Location: painel.php");

    } else {
        
        echo "Falha ao logar! E-mail ou senha incorretos";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="shortcut icon" href="trio.png" type="image/x-icon">
    
    <link rel="stylesheet" href="entrar.css">

</head>
<body>

<nav>

    <div class="logo">
        <a href="entrar.php"> Entrar </a>
    </div>
    
    <ul>
        <li> <a href="index.html"> Início </a> </li>
            <li> <a href="sobre.html"> Sobre nós </a> </li>
                <li> <a href="contato.html"> Contato </a> </li>
                    <li> <a href="tratamentos.html"> Tratamentos </a> </li>
                        <li> <a href="depoimentos.html"> Depoimentos </a> </li>
                            
    </ul>
</nav>

<form class="login" action="entrar.php" method="POST"> 
    <h2>Entrar na conta</h2>
        
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        
            <label for="password">Senha</label>
            <input type="password" id="password" name="senha">
        
            <button type="submit"><a href="painel.php">Entrar</a></button>
           
            <a href="cadastro.html"> Não tem uma conta? Crie uma! </a>
            
        
</form>



</body>
</html>
