<?php
    include "php/funcoes.php";

    autenticar_admin();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área da Instituição</title>
    <link rel="stylesheet" href="css/PagInst.css">
    <link rel="stylesheet" href="css/PagAdmin.css">
    <link rel="stylesheet" href="css/estilosBasicos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body id="body">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" id="nav">
        <div class="container-fluid">
            <img class="navbar-brand" src="img/logo.png" alt="logo do site" id="logo">
            <ul id="navItens" class="navbar-nav fw-bolder">
                <li class="nav-item px-2"><a class="nav-link" href="#sectNota">Média</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="#sectProfs">Professores</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="#sectNovaTurma">Nova Turma</a></li>
            </ul>
        </div>
    </nav>
