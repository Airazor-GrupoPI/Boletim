<?php
include "../funcoes.php";
    autenticar_admin();
    
include "../cabecalho.php";

?>

<main class="container-fluid my-5">
    <div class="container-fluid menu-Container" id="menuAdm">
        <h2>Menu Administração</h2>
        <div class="menu-Card">
            <!-- Dropdown para Professor -->
            <div class="dropdown my-1">
                <button class="dropdown-toggle col-12" type="button" id="dropdownProfessor" data-bs-toggle="dropdown" aria-expanded="false">
                    Professor
                </button>
                <ul class="dropdown-menu col-12 text-center" aria-labelledby="dropdownProfessor">
                    <li><a class="dropdown-item" href="PagProfessor.php">> Cadastrar</a></li>
                    <li><a class="dropdown-item" href="../listar/PagProfessor.php">> Listar</a></li>
                </ul>
            </div>

            <!-- Dropdown para Disciplina -->
            <div class="dropdown my-1">
                <button class="dropdown-toggle col-12" type="button" id="dropdownDisciplina" data-bs-toggle="dropdown" aria-expanded="false">
                    Disciplina
                </button>
                <ul class="dropdown-menu col-12 text-center" aria-labelledby="dropdownDisciplina">
                    <li><a class="dropdown-item" href="PagDisciplina.php">> Cadastrar</a></li>
                    <li><a class="dropdown-item" href="../listar/PagDisciplina.php">> Listar</a></li>
                </ul>
            </div>

            <!-- Dropdown para Conteúdo -->
            <div class="dropdown my-1">
                <button class="dropdown-toggle col-12" type="button" id="dropdownConteudo" data-bs-toggle="dropdown" aria-expanded="false">
                    Conteúdo
                </button>
                <ul class="dropdown-menu col-12 text-center" aria-labelledby="dropdownConteudo">
                    <li><a class="dropdown-item" href="PagConteudo.php">> Cadastrar</a></li>
                    <li><a class="dropdown-item" href="../listar/PagConteudo.php">> Listar</a></li>
                </ul>
            </div>

            <!-- Dropdown para Turma -->
            <div class="dropdown my-1">
                <button class="dropdown-toggle col-12" type="button" id="dropdownTurma" data-bs-toggle="dropdown" aria-expanded="false">
                    Turma
                </button>
                <ul class="dropdown-menu col-12 text-center" aria-labelledby="dropdownTurma">
                    <li><a class="dropdown-item" href="PagTurma.php">> Cadastrar</a></li>
                    <li><a class="dropdown-item" href="../listar/PagTurma.php">> Listar</a></li>
                </ul>
            </div>

            <!-- Dropdown para Aluno -->
            <div class="dropdown my-1">
                <button class="dropdown-toggle col-12" type="button" id="dropdownAluno" data-bs-toggle="dropdown" aria-expanded="false">
                    Aluno
                </button>
                <ul class="dropdown-menu col-12 text-center" aria-labelledby="dropdownAluno">
                    <li><a class="dropdown-item" href="PagAluno.php">> Cadastrar</a></li>
                    <li><a class="dropdown-item" href="../listar/PagAluno.php">> Listar</a></li>
                </ul>
            </div>

            <!-- Dropdown para Responsável -->
            <div class="dropdown my-1">
                <button class="dropdown-toggle col-12" type="button" id="dropdownResponsavel" data-bs-toggle="dropdown" aria-expanded="false">
                    Responsável
                </button>
                <ul class="dropdown-menu col-12 text-center" aria-labelledby="dropdownResponsavel">
                    <li><a class="dropdown-item" href="PagResponsavel.php">> Cadastrar</a></li>
                    <li><a class="dropdown-item" href="../listar/PagResponsavel.php">> Listar</a></li>
                </ul>
            </div>
        </div>

        <div class="labeln">
            <a href="../../PagLogin.php" class="active px-3 py-1" id="botaoRetorno">Sair</a>
        </div>
    </div>
</main>

<?php
include "../rodape.php";
?>