<?php
    session_start();

    include "funcoes.php";

    if(validar_admin($_POST["user"], $_POST["senha"])) {
        $_SESSION["admin"] = $_POST["user"];
        header("Location: http://localhost/PI-FatecMarilia-Termo2/php/cadastros/PagAdmin.php");
    }

?>