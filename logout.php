<?php
    // Verifica se a sessão existe
    if(!isset($_SESSION)){
        session_start();
    }
    // destruir variáveis da sessão
    session_destroy();

    header("Location: index.html");


?>
