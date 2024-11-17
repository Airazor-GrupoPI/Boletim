<?php
    function adicionar($tabela, $campos, $listavalores){
        include "banco/conexao.php";

        $listacampos = explode(",", $campos);

        $listaPlaceholders = [];
        $listaValoresSeguros = [];

        $sql = "SELECT MAX(codigo) AS ultimo_id FROM $tabela";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result != NULL){
            $novo_id = $result['ultimo_id'] + 1;
        } else{
            $novo_id = 0;
        }

        $sql  = "INSERT INTO $tabela (codigo, ";
        $sql .= $campos;
        $sql .= ") VALUES ($novo_id, ";
        for ($i = 0; $i < count($listacampos); $i++) {
            $listaPlaceholders[$i] = ":$listacampos[$i]";
        }
        $sql .= implode(",", $listaPlaceholders);
        $sql .= ");";

        for ($i = 0; $i < count($listavalores); $i+=1){
            $listaValoresSeguros[$i] = htmlspecialchars($listavalores[$i]);
        }

        $comando = $pdo->prepare($sql);

        for ($i = 0; $i < count($listacampos); $i++){
            $comando->bindParam(":$listacampos[$i]", $listaValoresSeguros[$i]);
        }
        
        $sucesso = $comando->execute();

        return $sucesso;
    }
?>