<?php
    include "../funcoes.php";
    autenticar_admin();

    include "../cabecalho.php";

    include "../banco/conexao.php";

    $sql = "SELECT codigo,nomeProfessor,emailProfessor,titulacao FROM professor ORDER BY nomeProfessor;";
    $comando = $pdo->prepare($sql);
    $comando->execute();
    $professores = $comando->fetchAll();
?>

<main class="container-fluid gx-0 my-5">
    <div class="container-fluid gx-0 menu-Container" id="menuAdm">
        <div id="cabecalho">
            <p>
            <h4>Menu Admin</h4>
            <h6>: Listar Professor</h6>
            </p>
        </div>
        <div class="container-fluid gx-0">
            <section class="container-fluid gx-0">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Titulação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($professores as $professor){ ?>
                        <tr>
                            <td><?= $professor["nomeProfessor"] ?></td>
                            <td><?= $professor["emailProfessor"] ?></td>
                            <td><?= $professor["titulacao"] ?></td>
                            <td>
                                <a href="../cadastros/PagProfessor.php?codigo=<?= $professor["codigo"] ?>">Alterar</a>
                                |
                                <a href="../crud/excluir.php?tabela=professor&codigo=<?= $professor["codigo"] ?>&caminho=../listar/PagProfessor.php">Excluir</a>
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