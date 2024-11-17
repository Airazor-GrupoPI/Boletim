<?php
    include "../../php/funcoes.php";
    autenticar_admin();
    
    include "../../php/cabecalho.php";

    include "../banco/conexao.php";

$sql = "SELECT codigo,nomeDisciplina,cargaHoraria,mediaParaPassar FROM disciplina ORDER BY nomeDisciplina;";
$comando = $pdo->prepare($sql);
$comando->execute();
$disciplinas = $comando->fetchAll();
?>

<main class="container-fluid gx-0 my-5">
    <div class="container-fluid gx-0 menu-Container" id="menuAdm">
        <div id="cabecalho">
            <p>
            <h4>Menu Admin</h4>
            <h6>: Listar Disciplina</h6>
            </p>
        </div>
        <div class="container-fluid gx-0">
            <section class="container-fluid gx-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Carga Horária</th>
                            <th>Média para passar</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($disciplinas as $disciplina){ ?>
                        <tr>
                            <td><?= $disciplina["nomeDisciplina"] ?></td>
                            <td><?= $disciplina["cargaHoraria"] ?></td>
                            <td><?= $disciplina["mediaParaPassar"] ?></td>
                            <td>
                                <a href="../cadastros/PagDisciplina.php?codigo=<?= $disciplina["codigo"] ?>">Alterar</a>
                                |
                                <a href="../crud/excluir.php?tabela=disciplina&codigo=<?= $disciplina["codigo"] ?>&caminho=../listar/PagDisciplina.php">Excluir</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </div>
        <div class="labeln">
            <p><a href="../cadastros/PagAdmin.php">&nbsp;Voltar&nbsp;</a></p>
        </div>
    </div>
</main>
  
    <?php
        include "../../php/rodape.php";
    ?>
