<?php
    include "../../php/funcoes.php";
    autenticar_admin();
    
    include "../../php/cabecalho.php";

    include "../banco/conexao.php";

    $sql = "SELECT codigo,nomeResponsavel,emailResponsavel FROM responsavel ORDER BY nomeResponsavel;";
    $comando = $pdo->prepare($sql);
    $comando->execute();
    $responsaveis = $comando->fetchAll();
?>

<main class="container-fluid gx-0 my-5">
    <div class="container-fluid gx-0 menu-Container" id="menuAdm">
        <div id="cabecalho">
            <p>
            <h4>Menu Admin</h4>
            <h6>: Listar Responsável</h6>
            </p>
        </div>
        <div class="container-fluid gx-0">
            <section class="container-fluid gx-0">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($responsaveis as $responsavel){ ?>
                        <tr>
                            <td><?= $responsavel["nomeResponsavel"] ?></td>
                            <td><?= $responsavel["emailResponsavel"] ?></td>
                            <td>
                                <a href="../cadastros/PagResponsavel.php?codigo=<?= $responsavel["codigo"] ?>">Alterar</a>
                                |
                                <a href="../crud/excluir.php?tabela=responsavel&codigo=<?= $responsavel["codigo"] ?>&caminho=../listar/PagResponsavel.php">Excluir</a>
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