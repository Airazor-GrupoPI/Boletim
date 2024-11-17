<?php
    
    function validar_admin($usuario, $senha){
        if ($usuario == "admin" && $senha == "1234"){
            return true;
        }
        return false;
    }

    function autenticar_admin(){
        session_start();

        if(!isset($_SESSION["admin"])) {
            header("Location: ../../PagLogin.php");
        }
    }

?>