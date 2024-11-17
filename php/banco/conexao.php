<?php

    $tipo_banco = "mysql";
    $servidor = "localhost"; // Endereço do servidor
    $banco = "boletim"; // Nome do banco de dados a ser usado
    $porta = 3306;
    $usuario = "root"; // Usuário que acessará o banco
    $senha = ""; // Senha cadastrada na criação do BD

    $dsn = "$tipo_banco:host=$servidor;dbname=$banco;port=$porta";

    try{
        $pdo = new PDO($dsn, $usuario, $senha);
        $pdo->exec("SET NAMES 'utf8'");
    }catch (PDOException $e){
        throw new PDOException($e->getMessage(), $e->getCode());
    }

?>