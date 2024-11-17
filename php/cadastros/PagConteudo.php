<?php
    include "../../php/funcoes.php";
/*
    autenticar_admin();
*/    
    include "../../php/cabecalho.php";

    include "../banco/conexao.php";

    $sql = "SELECT codigo, nomeDisciplina FROM disciplina ORDER BY nomeDisciplina ASC;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $disciplina = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <main class="container-fluid gx-0 my-5">
        <div class="container-fluid gx-0 menu-Container" id="menuAdm">
            <div id="cabecalho">
                <p><h4>Menu Admin</h4>
                <h6>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;Cadastrar Conteúdo</h6></p>
            </div>
            <div class="container-fluid gx-0">
                <section class="container-fluid gx-0">
                    <form action="../intermediarios/adicionarIntermediario.php" class="cabeca">
                        <input type="hidden" name="tabela" value="conteudo">
                        <input type="hidden" name="listaCampos" value="nomeConteudo,cargaHorariaConteudo,Disciplina_codigo">

                        <div class="labeln">
                            <label for="0">Nome: </label>
                            <textarea type="text" name="0" rows="2" cols="50" required></textarea>
                        </div>
                        <div class="labeln">
                            <label for="1">Carga horária: </label>
                            <input type="number" name="1" maxlength="10" required>
                        </div>
                        <div class="labeln">
                            <label for="2">Disciplina que pertence: </label>
                            <select name="2" required>
                                <option value="nan" selected>Selecione uma disciplina</option>
                                <?php foreach ($disciplina as $dis) { ?>
                                    <option value="<?= $dis["codigo"] ?>"><?= $dis["nomeDisciplina"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="labeln">
                            <button type="submit">Cadastrar</button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="labeln">
                <button onclick="history.go(-1);">Voltar</button>
            </div>
        </div>
    </main>
    
 
