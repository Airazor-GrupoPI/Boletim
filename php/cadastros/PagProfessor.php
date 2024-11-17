<?php
    include "../funcoes.php";
    autenticar_admin();
    
    include "../cabecalho.php";

    include "../banco/conexao.php";

    if (isset($_GET["codigo"])){
        $sqlProfessor = "SELECT * FROM professor WHERE codigo =" . $_GET["codigo"] . ";";
        $comando = $pdo->prepare($sqlProfessor);
        $comando->execute();
        $professor = $comando->fetch();
    }
?>

    <main class="container-fluid gx-0 my-5">
        <div class="container-fluid gx-0 menu-Container" id="menuAdm">
            <div id="cabecalho">
                <p><h4>Menu Admin</h4>
                <h6>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?= isset($_GET["codigo"]) ? "Alterar" : "Cadastrar" ?> Professor</h6></p>
            </div>
            <div class="container-fluid gx-0">
                <section class="container-fluid gx-0">
                    <form action="../intermediario.php" class="cabeca">
                        <input type="hidden" name="tabela" value="professor">
                        <?= isset($_GET["codigo"]) ? "<input type='hidden' name='codigo' value= '" . $professor["codigo"] ."'>"  : "" ?>
                        <input type="hidden" name="listaCampos" value="nomeProfessor,emailProfessor,titulacao<?= isset($_GET["codigo"]) ? ",codigo" : "" ?>">

                        <div  class="labeln">
                            <label for="0">Nome: </label>
                            <input type="text" name="0" <?= isset($_GET["codigo"]) ? "value= '". $professor["nomeProfessor"]."'" : "" ?> required>
                        </div>
                        <div class="labeln">
                            <label for="1">Email: </label>
                            <input type="email" name="1" <?= isset($_GET["codigo"]) ? "value= '". $professor["emailProfessor"]."'" : "" ?> required>
                        </div>
                        <div class="labeln">
                            <label for="2">Titulação: </label>
                            <select name="2">
                                <option value="nan">Selecione sua titulação</option>
                                <option <?= isset($_GET["codigo"]) ? ($professor["titulacao"] == "Não-Graduado" ? "selected" : "") : "" ?> value="Não-Graduado">Não-Graduado</option>
                                <option <?= isset($_GET["codigo"]) ? ($professor["titulacao"] == "Graduado" ? "selected" : "") : "" ?> value="Graduado">Graduado</option>
                                <option <?= isset($_GET["codigo"]) ? ($professor["titulacao"] == "Especialista" ? "selected" : "") : "" ?> value="Especialista">Especialista</option>
                                <option <?= isset($_GET["codigo"]) ? ($professor["titulacao"] == "Mestre" ? "selected" : "") : "" ?> value="Mestre">Mestre</option>
                                <option <?= isset($_GET["codigo"]) ? ($professor["titulacao"] == "Doutor" ? "selected" : "") : "" ?> value="Doutor">Doutor</option>
                                <option <?= isset($_GET["codigo"]) ? ($professor["titulacao"] == "Pós-Doutorado" ? "selected" : "") : "" ?> value="Pós-Doutorado">Pós-Doutorado</option>
                            </select>
                        </div>
                        <!--
                        <div  class="labeln">
                            <label for="3">Coordenador (S / N): </label>
                            <input type="text" name="3" maxlength="1" required>
                        </div>
                        -->
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
        include "../rodape.php";
    ?>

    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="../../js/PagInst.js"></script>
</body>

</html>