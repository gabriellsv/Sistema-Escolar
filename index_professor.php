<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Professor
require_once "Classes/Professor.php";
//instanciar a classe Professor
$Professor = new Professor();
//criar uma lista de Professor
$listaProfessor = $Professor->listarTodos();
//testar metodos
//var_dump($listaProfessor);
if (isset($_GET["numero"])){
$Professor->excluir($_GET["numero"]);
}
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

<div class="container lista">
    <div class="row">
        <div class="col-md-10">
            <h3>Lista de Professores</h3>
        </div>
        <div class="col-md-2">
            <a href="cadastrar_professor.php" class="btn btn-primary">Novo</a>
        </div>
    </div>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>Número</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>Matéria</th>
            <th>Telefone</th>
            <th></th> <!-- coluna vazia para botoes editar e excluir -->
        </tr>
        </thead>
        <tbody>
        <!-- imprimir a lista dos professor -->
        <?php if($listaProfessor):
            foreach ($listaProfessor as $professor): ?>
                <tr>
                    <td><?php echo $professor->numero; ?></td>
                    <td><?php echo $professor->nome; ?></td>
                    <td><?php echo $professor->sexo; ?></td>
                    <td><?php echo $professor->email; ?></td>
                    <td><?php echo $professor->materia; ?></td>
                    <td><?php echo $professor->telefone; ?></td>
                    <td><?php echo $professor->endereco; ?></td>

                    <td>
                        <a href="alterar_professor.php?numero=<?php echo $professor->numero; ?>" class="btn btn-success"><img src="img/edit.png" width="25px" height="25px"></a>
                        <a href="index_professor.php?numero=<?php echo $professor->numero; ?>" class="btn btn-danger"><img src="img/delete.png" width="25px" height="25px"></a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php else : ?>
            <tr>
                <td colspan="7">Nenhum professor cadastrado!!!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html

