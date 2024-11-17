<?php
$listaValores = [];

for ($i = 0; $i < (isset($_GET["codigo"]) ? count($_GET) - 3 : count($_GET) - 2); $i++){
    $listaValores[$i] = $_GET["$i"];
}

include "crud/adicionar.php";
include "crud/alterar.php";

if (isset($_GET["codigo"])){
    $listaValores[count($listaValores)] = $_GET["codigo"];
    alterar($_GET['tabela'], $_GET["listaCampos"], $listaValores);
} else{
    adicionar($_GET['tabela'], $_GET["listaCampos"], $listaValores);
}

header("Location: cadastros/PagAdmin.php");
?>