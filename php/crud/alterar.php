<?php function alterar($tabela, $campos, $listavalores)
{
    include "banco/conexao.php";
    $listacampos = explode(",", $campos);
    $listaPlaceholders = [];
    $listaValoresSeguros = [];
    $sql = "UPDATE $tabela SET ";
    for ($i = 0; $i < count($listacampos) - 1; $i++) {
        $listaPlaceholders[] = "$listacampos[$i] = :$listacampos[$i]";
    }
    $sql .= implode(", ", $listaPlaceholders);
    $sql .= " WHERE ".end($listacampos)." = :".end($listacampos).";";
    for ($i = 0; $i < count($listavalores); $i++) {
        $listaValoresSeguros[$i] = htmlspecialchars($listavalores[$i]);
    }
    echo $sql;
    $comando = $pdo->prepare($sql);
    for ($i = 0; $i < count($listacampos); $i++) {
        $comando->bindParam(":$listacampos[$i]", $listaValoresSeguros[$i]);
    }

    $sucesso = $comando->execute();
    return $sucesso;
}