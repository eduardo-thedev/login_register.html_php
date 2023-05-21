
<?php
include('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $strcon = mysqli_connect('localhost','root','','meubd');

    $sql = "INSERT INTO usuarios(nome, email, senha)
    VALUES ('$nome','$email','$senha')";
    
    $resultado = mysqli_query($strcon,$sql) or die("Erro ao executar a inserção dos dados");
    echo "Registro inserido com sucesso";
    mysqli_close($strcon);
    
    header("Location: entrar.php");

?>
