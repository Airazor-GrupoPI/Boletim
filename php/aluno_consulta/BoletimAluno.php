<?php
    include "../../php/funcoes.php";
    include "../../php/cabecalho.php";
    include "../banco/conexao.php";

    $alunoId = 1; 
    $sql = "SELECT t.codigo AS turmaCodigo, t.identificadorTurma, d.codigo AS disciplinaCodigo, d.nomeDisciplina
            FROM aluno a
            INNER JOIN turma t ON a.Turma_codigo = t.codigo AND a.Turma_Modalidade_codigo = t.Modalidade_codigo
            INNER JOIN modalidade_has_disciplina md ON t.Modalidade_codigo = md.Modalidade_codigo
            INNER JOIN disciplina d ON md.Disciplina_codigo = d.codigo
            WHERE a.codigo = :alunoId
            ORDER BY d.nomeDisciplina ASC;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':alunoId', $alunoId, PDO::PARAM_INT);
    $stmt->execute();
    $disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="container-fluid gx-0 my-5">
    <div class="container-fluid gx-0 menu-Container" id="menuBoletim">
        <div id="cabecalho">
            <h4>Disciplinas do Aluno</h4>
        </div>
        <div class="container-fluid gx-0">
            <section class="container-fluid gx-0">
                <ul>
                    <?php foreach ($disciplinas as $disciplina) { ?>
                        <li>
                            <button class="btn btn-primary mb-2 open-modal" 
                                    data-disciplina="<?= $disciplina['disciplinaCodigo'] ?>" 
                                    data-aluno="<?= $alunoId ?>">
                                <?= $disciplina["nomeDisciplina"] ?>
                            </button>
                        </li>
                    <?php } ?>
                </ul>
            </section>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="disciplinaModal" tabindex="-1" role="dialog" aria-labelledby="disciplinaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disciplinaModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="descricaoDisciplina"></h6>
                <h5>Notas por Semestre</h5>
                <div id="notasSemestres"></div>
                <h5>Gráficos de Simulação</h5>
                <div id="graficosPizza"></div>
            </div>
        </div>
    </div>
</div>

<?php include "../../php/rodape.php"; ?>

