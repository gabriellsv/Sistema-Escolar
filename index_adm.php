<?php
header("Content-type:text/html; charset=utf8");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Sistema Escolar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="index_adm.php">Sistema Escolar - Painel Administrativo</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index_aluno.php">Alunos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index_professor.php">Professores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index_funcionario.php">Funcionários</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index_curso.php">Cursos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index_disciplina.php">Disciplinas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Sair</a>
        </li>
    </ul>
</nav>

<div class="container">

<!--    <div class="col-md-4">-->
<!--        <div class="card card_alunos">-->
<!--            <div class="card-title">Alunos</div>-->
<!--            <div class="card-title">-->
<!--                <img src="img/Aluno.png" alt=""> 1500</div>-->
<!--        </div>-->
<!--    </div>-->


    <div class="row">
        <div class="col-md-4">
            <div class="aluno">
                <div class="texto">
                    <h3 align="center" style="color: white">Alunos</h3>
                </div>
                <div class="foto">
                    <img src="img/Aluno.png" width="150" height="150">
                </div>
                <div class="numero" align="center">
                     <label for="numero">1500</label>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="aluno">
                <div class="texto">
                <h3 align="center" style="color: white">Professores</h3>
                </div>
                <div class="foto">
                    <img src="img/Professor.png" width="150" height="150">
                </div>
                <div class="numero" align="center">
                    <label for="numero">35</label>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="aluno">
                <div class="texto">
                <h3 align="center" style="color: white">Cursos</h3>
                </div>
                <div class="foto">
                    <img src="img/Curso.png" width="150" height="150">
                </div>
                <div class="numero" align="center">
                    <label for="numero">3</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="aluno">
                <div class="texto">
                <h3 align="center" style="color: white">Disciplinas</h3>
                </div>
                <div class="foto">
                    <img src="img/Disciplina.png" width="150" height="150">
                </div>
                <div class="numero" align="center">
                    <label for="numero">56</label>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="aluno">
                <div class="texto">
                <h3 align="center" style="color: white">Funcionários</h3>
                </div>
                <div class="foto">
                    <img src="img/Funcionarios.png" width="150" height="150">
                </div>
                <div class="numero" align="center">
                    <label for="numero">13</label>
                </div>
            </div>
        </div>
    </div>




</div>
</body>
</html

