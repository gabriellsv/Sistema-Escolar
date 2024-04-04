<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Alunos
require_once "Classes/Alunos.php";
//instanciar a classe Alunos
$Alunos = new Alunos();
//criar uma lista de alunos
$listaAlunos = $Alunos->listarTodos();
//testar metodos
//var_dump($listaAlunos);
//chamado a funcao excluir passando a matricula escolhida pelo usuario
if (isset($_GET["matricula"])){
    $Alunos->excluir($_GET["matricula"]);
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
<!--    lista de alunos -->
    <div class="row">
        <div class="col-md-10">
            <h3>Lista de Alunos</h3>
        </div>
        <div class="col-md-2">
            <a href="cadastrar_aluno.php" class="btn btn-primary">Novo</a>
        </div>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th></th> <!-- coluna vazia para botoes editar e excluir -->
            </tr>
        </thead>
        <tbody>
        <!-- imprimir a lista dos alunos -->
        <?php if($listaAlunos):
            foreach ($listaAlunos as $aluno): ?>
                <tr>
                    <td><?php echo $aluno->matricula; ?></td>
                    <td><?php echo $aluno->nome; ?></td>
                    <td><?php echo $aluno->sexo; ?></td>
                    <td><?php echo $aluno->email; ?></td>
                    <td><?php echo $aluno->telefone; ?></td>
                    <td><?php echo $aluno->endereco; ?></td>
                    <td>
                        <a href="alterar_aluno.php?matricula=<?php echo $aluno->matricula; ?>" class="btn btn-success"><img src="img/edit.png" width="25px" height="25px"></a>
                        <a href="index_aluno.php?matricula=<?php echo $aluno->matricula; ?>" class="btn btn-danger"><img src="img/delete.png" width="25px" height="25px"></a>
                    </td>
                </tr>
            <?php endforeach;?>
            <?php else : ?>
                <tr>
                    <td colspan="7">Nenhum aluno cadastrado!!!</td>
                </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>