<?php
    include "../../php/funcoes.php";
    include "../../php/cabecalho.php";
    include "../banco/conexao.php";

    $alunoID = 1;  

    $semestre = 3;    /* valor default */  
    $anoAtividade = 2025;     /* valor default */  




    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $alunoID = $_POST['alunoID'] ?? $alunoID;
        $anoAtividade = $_POST['anoAtividade'] ?? $anoAtividade;
        $semestre = $_POST['semestre'] ?? $semestre;
    }


    $sql = "SELECT t.codigo AS turmaCodigo, t.identificadorTurma, d.codigo AS disciplinaCodigo, d.nomeDisciplina
            FROM aluno a
            INNER JOIN turma t ON a.Turma_codigo = t.codigo AND a.Turma_Modalidade_codigo = t.Modalidade_codigo
            INNER JOIN modalidade_has_disciplina md ON t.Modalidade_codigo = md.Modalidade_codigo
            INNER JOIN disciplina d ON md.Disciplina_codigo = d.codigo
            WHERE a.codigo = :alunoID
            ORDER BY d.nomeDisciplina ASC;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':alunoID', $alunoID, PDO::PARAM_INT);
    $stmt->execute();
    $disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disciplinas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Boletim do Aluno</h1>

        <form action="" method="POST">
            <div class="form-group">
                <label>ID Aluno:</label><input class="form-control" type="text" name="alunoID" value="<?php echo $alunoID; ?>"> <br>
                <label>Ano:</label><input class="form-control" type="text" name="anoAtividade"  value="<?php echo $anoAtividade; ?>"> <br>
                <label >Semestre:</label>
                <select name="semestre" class="form-control">
                <option value = "1" <?php if ($semestre == 1) echo 'selected'; ?>>1</option>
                <option value = "2" <?php if ($semestre == 2) echo 'selected'; ?>>2</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Consultar Notas">
            </div>
        </form>

        <div class="row">
            <?php foreach ($disciplinas as $disciplina): ?>
                
                <?php 
                $resquery = null;
                $P1 = 0;
                $P2 = 0;
                $P3 = 0;
                $T1 = 0;
                $T2 = 0;
                $faltasAluno;


                /* Pega a nota da P1 no banco */
                $sql = "SELECT notaAluno 
                FROM aluno_has_disciplina
                WHERE Aluno_codigo = :alunoID  AND anoAtividade = :anoAtividade AND semestre = :semestre AND tipoAtividade = 'P1' AND Disciplina_codigo = :Disciplina_codigo" ;
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':alunoID', $alunoID, PDO::PARAM_INT);          
                $stmt->bindParam(':anoAtividade', $anoAtividade, PDO::PARAM_INT); 
                $stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);  
                $stmt->bindParam(':Disciplina_codigo', $disciplina['disciplinaCodigo'], PDO::PARAM_INT);       
                $stmt->execute();
                $resquery = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($resquery === false){} else{
                $P1 = (float)$resquery['notaAluno'];}


                /* Pega a nota da P2 no banco */
                $sql = "SELECT notaAluno 
                FROM aluno_has_disciplina
                WHERE Aluno_codigo = :alunoID  AND anoAtividade = :anoAtividade AND semestre = :semestre AND tipoAtividade = 'P2' AND Disciplina_codigo = :Disciplina_codigo" ;
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':alunoID', $alunoID, PDO::PARAM_INT);          
                $stmt->bindParam(':anoAtividade', $anoAtividade, PDO::PARAM_INT); 
                $stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);  
                $stmt->bindParam(':Disciplina_codigo', $disciplina['disciplinaCodigo'], PDO::PARAM_INT);       
                $stmt->execute();
                $resquery = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($resquery === false){} else{
                $P2 = (float)$resquery['notaAluno'];}

                
                
                /* Pega a nota da P3 no banco */
                $sql = "SELECT notaAluno 
                FROM aluno_has_disciplina
                WHERE Aluno_codigo = :alunoID  AND anoAtividade = :anoAtividade AND semestre = :semestre AND tipoAtividade = 'P3' AND Disciplina_codigo = :Disciplina_codigo" ;
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':alunoID', $alunoID, PDO::PARAM_INT);          
                $stmt->bindParam(':anoAtividade', $anoAtividade, PDO::PARAM_INT); 
                $stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);  
                $stmt->bindParam(':Disciplina_codigo', $disciplina['disciplinaCodigo'], PDO::PARAM_INT);       
                $stmt->execute();
                $resquery = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($resquery === false){} else{
                $P3 = (float)$resquery['notaAluno'];}
 
              
                /* Pega a nota do T1 no banco */
                $sql = "SELECT notaAluno 
                FROM aluno_has_disciplina
                WHERE Aluno_codigo = :alunoID  AND anoAtividade = :anoAtividade AND semestre = :semestre AND tipoAtividade = 'T1' AND Disciplina_codigo = :Disciplina_codigo" ;
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':alunoID', $alunoID, PDO::PARAM_INT);          
                $stmt->bindParam(':anoAtividade', $anoAtividade, PDO::PARAM_INT); 
                $stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);  
                $stmt->bindParam(':Disciplina_codigo', $disciplina['disciplinaCodigo'], PDO::PARAM_INT);       
                $stmt->execute();
                $resquery = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($resquery === false){} else{
                $T1 = (float)$resquery['notaAluno'];}              

                /* Pega a nota do T2 no banco */
                $sql = "SELECT notaAluno 
                FROM aluno_has_disciplina
                WHERE Aluno_codigo = :alunoID  AND anoAtividade = :anoAtividade AND semestre = :semestre AND tipoAtividade = 'T2' AND Disciplina_codigo = :Disciplina_codigo" ;
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':alunoID', $alunoID, PDO::PARAM_INT);          
                $stmt->bindParam(':anoAtividade', $anoAtividade, PDO::PARAM_INT); 
                $stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);  
                $stmt->bindParam(':Disciplina_codigo', $disciplina['disciplinaCodigo'], PDO::PARAM_INT);       
                $stmt->execute();
                $resquery = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($resquery === false){} else{
                $T2 = (float)$resquery['notaAluno'];}   

                ?>
                
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <?= htmlspecialchars($disciplina['nomeDisciplina']) ?>
                        </div>
                        <div class="card-body">
                         <h5 class="card-title"> Notas do <?php echo $semestre ?>º Semestre:</h5>
                            <p class="card-text"> P1: <?php echo number_format((float)$P1, 2, '.', ''); ?> </p> 
                            <p class="card-text"> P2: <?php echo number_format((float)$P2, 2, '.', ''); ?> </p> 
                            <p class="card-text"> T1: <?php echo number_format((float)$T1, 2, '.', ''); ?> </p> 
                            <p class="card-text"> T2: <?php echo number_format((float)$T2, 2, '.', ''); ?> </p> 
                            <?php if (($P1 + $P2 + ($T1 + $T2)) / 3 < 6): ?>
                                <p class="card-text">P3: <?php echo number_format((float)$P3, 2, '.', ''); ?></p>
                            <?php endif; ?>
                            <p class="card-text"> Media do Semestre: <?php echo number_format((float)($P1 + $P2 + ($T1 + $T2)) / 3, 2, '.', ''); ?> </p> 
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
        include "../../php/rodape.php";
?>


