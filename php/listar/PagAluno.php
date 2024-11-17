<?php
include "../funcoes.php";
    autenticar_admin();

include "../banco/conexao.php";

$sql = "SELECT a.codigo,a.nomeAluno,a.emailAluno,t.identificadorTurma,m.tipoModalidade FROM aluno a INNER JOIN turma t ON a.Turma_codigo = t.codigo INNER JOIN modalidade m ON a.Turma_Modalidade_codigo = m.codigo ORDER BY nomeAluno;";
$comando = $pdo->prepare($sql);
$comando->execute();
$alunos = $comando->fetchAll();

include "../cabecalho.php";
?>

<main class="container-fluid gx-0 my-5">
    <div class="container-fluid gx-0 menu-Container" id="menuAdm">
        <div id="cabecalho">
            <p>
            <h4>Menu Admin</h4>
            <h6>: Listar Aluno</h6>
            </p>
        </div>
        <div class="container-fluid gx-0">
            <section class="container-fluid gx-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Turma</th>
                            <th>Modalidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alunos as $aluno){ ?>
                        <tr>
                            <td><?= $aluno["nomeAluno"] ?></td>
                            <td><?= $aluno["emailAluno"] ?></td>
                            <td><?= $aluno["identificadorTurma"] ?></td>
                            <td><?= $aluno["tipoModalidade"] ?></td>
                            <td>
                                <a href="../cadastros/PagAluno.php?codigo=<?= $aluno["codigo"] ?>">Alterar</a>
                                |
                                <a href="../crud/excluir.php?tabela=aluno&codigo=<?= $aluno["codigo"] ?>&caminho=../listar/PagAluno.php">Excluir</a>
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
include "../rodape.php";
?>