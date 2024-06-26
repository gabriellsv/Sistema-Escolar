<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Alunos
require_once "Classes/Professor.php";
//instaciar a classe Alunos
$Professor = new Professor();

//recuperar os dados do aluno escolhido no index_professor.php
if(isset($_GET["numero"])) {
    $dadosProfessor = $Professor->listarID($_GET["numero"]);

}
//chamando a função alterar após o usuário clicar no botão salvar
if(isset($_POST["Salvar"])){
//   chamar a funcao alterar
    $Professor->alterar();
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <a class="nav-link" href="index_professor.php">Professor</a>
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
            <div align="center">
                <img src="img/logo.png" alt="Logo">
            </div>
        <div class="row">
        <div class="col-lg-12">
            <form action="alterar_professor.php?numero=<?php echo $dadosProfessor->numero; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-lg-9">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $dadosProfessor->nome; ?>" >
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="sexo">Sexo</label>
                            <select  name="sexo" class="form-control" >
                                <option value="Masculino" <?php if($dadosProfessor->sexo == "Masculino"){ echo "selected";} ?>>Masculino</option>
                                <option value="Feminino" <?php if($dadosProfessor->sexo == "Feminino"){ echo "selected";} ?>>Feminino</option>
                                <option value="Outros" <?php if($dadosProfessor->sexo == "Outros"){ echo "selected";} ?>>Outros</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $dadosProfessor->email; ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" class="form-control" value="<?php echo $dadosProfessor->endereco; ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="materia">Matéria</label>
                            <input type="text" name="materia" class="form-control" value="<?php echo $dadosProfessor->materia; ?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" class="form-control" value="<?php echo $dadosProfessor->telefone; ?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control" value="<?php echo $dadosProfessor->senha; ?>">
                        </div>
                    </div>
                    <div align="center">
                        <button class="btn btn-success" type="submit" name="Salvar">Salvar</button>
                        <a class="btn btn-outline-danger" href="index_professor.php">Cancelar</a>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
</html