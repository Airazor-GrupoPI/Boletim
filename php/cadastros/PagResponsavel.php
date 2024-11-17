<?php
    include "../../php/funcoes.php";
    autenticar_admin();
  
    include "../../php/cabecalho.php";

    include "../banco/conexao.php";

    if (isset($_GET["codigo"])){
        $sqlResponsavel = "SELECT * FROM responsavel WHERE codigo =" . $_GET["codigo"] . ";";
        $comando = $pdo->prepare($sqlResponsavel);
        $comando->execute();
        $responsavel = $comando->fetch();
    }
?>

    <main class="container-fluid gx-0 my-5">
        <div class="container-fluid gx-0 menu-Container" id="menuAdm">
            <div id="cabecalho">
                <p><h4>Menu Admin</h4>
                <h6>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?= isset($_GET["codigo"]) ? "Alterar" : "Cadastrar" ?> Responsável</h6></p>
            </div>
            <div class="container-fluid gx-0">
                <section class="container-fluid gx-0">
                    <form action="../intermediario.php" class="cabeca">
                        <input type="hidden" name="tabela" value="responsavel">
                        <?= isset($_GET["codigo"]) ? "<input type='hidden' name='codigo' value= '" . $responsavel["codigo"] ."'>"  : "" ?>
                        <input type="hidden" name="listaCampos" value="nomeResponsavel,emailResponsavel<?= isset($_GET["codigo"]) ? ",codigo" : "" ?>">

                        <div  class="labeln">
                            <label for="0">Nome: </label>
                            <input type="text" name="0" <?= isset($_GET["codigo"]) ? "value= '". $responsavel["nomeResponsavel"]."'" : "" ?> required>
                        </div>
                        <div class="labeln">
                            <label for="1">Email: </label>
                            <input type="email" name="1" <?= isset($_GET["codigo"]) ? "value= '". $responsavel["emailResponsavel"]."'" : "" ?> required>
                        </div>
                        <div class="labeln">
                            <button type="submit"><?= isset($_GET["codigo"]) ? "Alterar" : "Cadastrar" ?></button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="labeln">
                <button onclick="history.go(-1);">&nbsp;Voltar&nbsp;</button>
            </div>
        </div>
    </main>

    <?php
        include "../../php/rodape.php";
    ?>