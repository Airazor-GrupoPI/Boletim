<?php
    include "php/funcoes.php";
/*
    autenticar_admin();
*/    
    include "php/cabecalho.php";

?>

    <main class="container-fluid gx-0">

        <div class="row text-center py-4">
            <!-- <h1>(Nome da Instituição)</h1> -->
        </div>

        <div class="container-fluid gx-0 menu-Container" id="menuAdm">
            <div id="cabecalho">
                <p><h4>Menu Admin</h4>
                <h6>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;Cadastrar Conteúdo</h6></p>
            </div>
            <div class="container-fluid gx-0">
                <section class="container-fluid gx-0">
                    <form action="" class="cabeca">
                        <div class="labeln">
                            <label for="nome">Nome: </label>
                            <textarea type="text" name="nome" rows="2" cols="50" required></textarea>
                        </div>
                        <div class="labeln">
                            <label for="carga">Carga horária: </label>
                            <input type="number" name="carga" maxlength="10" required>
                        </div>
                        <div class="labeln">
                            <button type="submit">Cadastrar</button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="labeln">
                <button onclick="history.go(-1);">Voltar</button>
            </div>
        </div>
    </main>
    <div class="labeln">
        <p>&nbsp;</p>
    </div>

    <?php
        include "php/rodape.php";
    ?>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/PagInst.js"></script>
</body>

</html>
