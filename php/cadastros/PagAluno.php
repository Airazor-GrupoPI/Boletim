<?php
include "../funcoes.php";
    autenticar_admin();

include "../banco/conexao.php";

$sqlTurmas = "SELECT codigo, identificadorTurma FROM turma ORDER BY identificadorTurma ASC;";
$stmtTurmas = $pdo->prepare($sqlTurmas);
$stmtTurmas->execute();
$turmas = $stmtTurmas->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obter as modalidades
$sqlModalidades = "SELECT codigo, tipoModalidade FROM modalidade ORDER BY tipoModalidade ASC;";
$stmtModalidades = $pdo->prepare($sqlModalidades);
$stmtModalidades->execute();
$modalidades = $stmtModalidades->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET["codigo"])){
    $sqlAluno = "SELECT * FROM aluno WHERE codigo =" . $_GET["codigo"] . ";";
    $comando = $pdo->prepare($sqlAluno);
    $comando->execute();
    $aluno = $comando->fetch();
}

include "../cabecalho.php";
?>

<main class="container-fluid gx-0 my-5">
    <div class="container-fluid gx-0 menu-Container" id="menuAdm">
        <div id="cabecalho">
            <p>
            <h4>Menu Admin</h4>
            <h6>: <?= isset($_GET["codigo"]) ? "Alterar" : "Cadastrar" ?> Aluno</h6>
            </p>
        </div>
        <div class="container-fluid gx-0">
            <section class="container-fluid gx-0">
                <form action="../intermediario.php" method="GET" class="cabeca">

                    <input type="hidden" name="tabela" value="aluno"> 
                    <?= isset($_GET["codigo"]) ? "<input type='hidden' name='codigo' value= '" . $aluno["codigo"] ."'>"  : "" ?> 
                    <input type="hidden" name="listaCampos" value="nomeAluno,emailAluno,Turma_codigo,Turma_Modalidade_codigo<?= isset($_GET["codigo"]) ? ",codigo" : "" ?>">

                    <div class="labeln">
                        <label for="0">Nome: </label>
                        <input type="text" name="0" <?= isset($_GET["codigo"]) ? "value= '". $aluno["nomeAluno"]."'" : "" ?> required>
                    </div>
                    <div class="labeln">
                        <label for="1">Email: </label>
                        <input type="email" name="1" <?= isset($_GET["codigo"]) ? "value= ". $aluno["emailAluno"] : "" ?> required>
                    </div>
                    <div class="labeln">
                        <label for="2">Turma: </label>
                        <select name="2" required>
                            <option value="nan">Selecione uma turma</option>
                            <?php foreach ($turmas as $turma) { ?>
                                <option value="<?= $turma["codigo"] ?>" <?= isset($_GET["codigo"]) ? ($aluno["Turma_codigo"] == $turma["codigo"] ? "selected" : "") : "" ?>><?= $turma["identificadorTurma"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="labeln">
                        <label for="3">Modalidade: </label>
                        <select name="3" required>
                            <option value="nan" selected>Selecione uma modalidade</option>
                            <?php foreach ($modalidades as $modalidade) { ?>
                                <option value="<?= $modalidade["codigo"] ?>" <?= isset($_GET["codigo"]) ? ($aluno["Turma_Modalidade_codigo"] == $modalidade["codigo"] ? "selected" : "") : "" ?>><?= $modalidade["tipoModalidade"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="labelr">
                        <p><a href="PagResponsavel.php">&nbsp;Vincular Responsável&nbsp;</a></p>
                    </div>
                    <div class="labeln">
                        <button type="submit"><?= isset($_GET["codigo"]) ? "Alterar" : "Cadastrar" ?></button>
                    </div>
                </form>
            </section>
        </div>
        <div class="labeln">
            <p><a href="PagAdmin.php">&nbsp;Voltar&nbsp;</a></p>
        </div>
    </div>
</main>

<?php
include "../rodape.php";
?>