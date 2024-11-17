<?php
    session_start();

    include "funcoes.php";

    if(validar_admin($_POST["user"], $_POST["senha"])) {
        $_SESSION["admin"] = $_POST["user"];
        header("Location: http://localhost/Boletim/php/cadastros/PagAdmin.php");
    }

?>