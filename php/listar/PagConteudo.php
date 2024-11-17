<?php
    include "../../php/funcoes.php";
    autenticar_admin();
    
    include "../../php/cabecalho.php";

    include "../banco/conexao.php";

$sql = "SELECT c.codigo,c.nomeConteudo,c.cargaHorariaConteudo,d.nomeDisciplina FROM conteudo c INNER JOIN disciplina d ON c.Disciplina_codigo = d.codigo ORDER BY nomeConteudo;";
$comando = $pdo->prepare($sql);
$comando->execute();
$conteudos = $comando->fetchAll();
?>

<main class="container-fluid gx-0 my-5">
    <div class="container-fluid gx-0 menu-Container" id="menuAdm">
        <div id="cabecalho">
            <p>
            <h4>Menu Admin</h4>
            <h6>: Listar Conteúdo</h6>
            </p>
        </div>
        <div class="container-fluid gx-0">
            <section class="container-fluid gx-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Carga Horária</th>
                            <th>Disciplina pertencente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($conteudos as $conteudo){ ?>
                        <tr>
                            <td><?= $conteudo["nomeConteudo"] ?></td>
                            <td><?= $conteudo["cargaHorariaConteudo"] ?></td>
                            <td><?= $conteudo["nomeDisciplina"] ?></td>
                            <td>
                                <a href="../cadastros/PagConteudo.php?codigo=<?= $conteudo["codigo"] ?>">Alterar</a>
                                |
                                <a href="../crud/excluir.php?tabela=conteudo&codigo=<?= $conteudo["codigo"] ?>&caminho=../listar/PagConteudo.php"">Excluir</a>
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
