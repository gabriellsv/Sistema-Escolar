<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Funcionario
require_once "Classes/Funcionario.php";
//instanciar a classe Funcionario
$Funcionario = new Funcionario();
//criar uma lista de Funcionario
$listaFuncionario = $Funcionario->listarTodos();
//testar metodos
//var_dump($listaFuncionario);
if (isset($_GET["numero"])){
$Funcionario->excluir($_GET["numero"]);
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
            <h3>Lista de Funcionários</h3>
        </div>
        <div class="col-md-2">
            <a href="cadastrar_funcionario.php" class="btn btn-primary">Novo</a>
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
            <th>Setor</th>
            <th>Telefone</th>
            <th></th> <!-- coluna vazia para botoes editar e excluir -->
        </tr>
        </thead>
        <tbody>
        <!-- imprimir a lista dos professor -->
        <?php if($listaFuncionario):
            foreach ($listaFuncionario as $funcionario): ?>
                <tr>
                    <td><?php echo $funcionario->numero; ?></td>
                    <td><?php echo $funcionario->nome; ?></td>
                    <td><?php echo $funcionario->sexo; ?></td>
                    <td><?php echo $funcionario->email; ?></td>
                    <td><?php echo $funcionario->setor; ?></td>
                    <td><?php echo $funcionario->telefone; ?></td>
                    <td><?php echo $funcionario->endereco; ?></td>

                    <td>
                        <a href="alterar_funcionario.php?numero=<?php echo $funcionario->numero; ?>" class="btn btn-success"><img src="img/edit.png" width="25px" height="25px"></a>
                        <a href="index_funcionario.php?numero=<?php echo $funcionario->numero; ?>" class="btn btn-danger"><img src="img/delete.png" width="25px" height="25px"></a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php else : ?>
            <tr>
                <td colspan="7">Nenhum funcionario cadastrado!!!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html

