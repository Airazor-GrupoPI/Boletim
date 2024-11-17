<?php
    include "../../php/funcoes.php";
    autenticar_admin();

    include "../../php/cabecalho.php";

    include "../banco/conexao.php";

    if (isset($_GET["codigo"])){
        $sqlDisciplina = "SELECT * FROM disciplina WHERE codigo =" . $_GET["codigo"] . ";";
        $comando = $pdo->prepare($sqlDisciplina);
        $comando->execute();
        $disciplina = $comando->fetch();
    }
?>

    <main class="container-fluid gx-0 my-5">
        <div class="container-fluid gx-0 menu-Container" id="menuAdm">
            <div id="cabecalho">
                <p><h4>Menu Admin</h4>
                <h6>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?= isset($_GET["codigo"]) ? "Alterar" : "Cadastrar" ?> Disciplina</h6></p>
            </div>
            <div class="container-fluid gx-0">
                <section class="container-fluid gx-0">
                    <form action="../intermediario.php" class="cabeca">
                        <input type="hidden" name="tabela" value="disciplina">
                        <?= isset($_GET["codigo"]) ? "<input type='hidden' name='codigo' value= '" . $disciplina["codigo"] ."'>"  : "" ?>
                        <input type="hidden" name="listaCampos" value="nomeDisciplina,cargaHoraria,mediaParaPassar<?= isset($_GET["codigo"]) ? ",codigo" : "" ?>">

                        <div  class="labeln">
                            <label for="0">Nome: </label>
                            <input type="text" name="0" <?= isset($_GET["codigo"]) ? "value= '". $disciplina["nomeDisciplina"]."'" : "" ?> required>
                         </div>
                        <div class="labeln">
                            <label for="1">Carga horária: </label>
                            <input type="number" name="1" maxlength="10" <?= isset($_GET["codigo"]) ? "value= '". $disciplina["cargaHoraria"]."'" : "" ?> step="any" required>
                        </div>
                        <div class="labeln">
                            <label for="2">Média para passar: </label>
                            <input type="number" name="2" max="10" min="0" <?= isset($_GET["codigo"]) ? "value= '". $disciplina["mediaParaPassar"]."'" : "" ?> step="any" required>
                        </div>
                        <div class="labelr">
                            <p><a href="PagConteudo.php">&nbsp;Relacionar Conteúdo&nbsp;</a></p>
                        </div>
                        <div class="labeln">
                            <button type="submit"><?= isset($_GET["codigo"]) ? "Alterar" : "Cadastrar" ?></button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="labeln">
                <p><a href="PagAdmin.php">&nbsp;&nbsp;Voltar&nbsp;&nbsp;</a></p>
            </div>
        </div>
    </main>
  
    <?php
        include "../../php/rodape.php";
    ?>
