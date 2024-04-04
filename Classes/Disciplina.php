<?php
// importar classe conexao
// include  / require -> diferenca:
// include -> importa o arquivo e apenas da mensagem de erro, nao quebra a execucao
// require -> importa o arquivo e da mensagem de erro, quebra a execucao
// once -> importa apenas uma unica vez

require_once "Conexao.php";

class Disciplina
{
// numero / Nome / Sexo / Email / Endereço Completo / Telefone / Senha
// atributos
    public $numero;
    public $nome;
    public $conteudo;
    public $turma;
    public $curso;

// metodos
// metodo para listar todos disciplina ( select * from disciplina)
public function listarTodos(){
    //validar execucao do codigo
    try{
        //criar uma instancia da classe conexao
        $bd = new Conexao();
        //criar um objeto com a conexao ao PDO
        $con = $bd->conectar();

        // criar o comando sql para enviar ao banco de dados
        $sql = $con->prepare("select * from disciplina");

        //executar o comando
        $sql->execute();

        //testar se retornou resultados
        if ($sql->rowCount() > 0){
            //se tem resultados devolver os dados para o HTML
            return $result = $sql->fetchAll(PDO::FETCH_CLASS); // fetchALL -> devolve resultado no formato linhas/colunas
        }

    }catch (PDOException $msg){
        echo "Não foi possível listar as disciplina: ".$msg->getMessage();
    }
}
    public function inserir(){
        try{
            //verificar se recebeu valores do formulario
            if (isset($_POST['nome']) && isset($_POST['conteudo']) && isset($_POST['turma']) && isset($_POST['curso'])){
                $this->nome = $_POST["nome"];
                $this->conteudo = $_POST["conteudo"];
                $this->turma = $_POST["turma"];
                $this->curso = $_POST["curso"];
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco passando parametros ?
                $sql = $con->prepare("insert into disciplina(numero, nome, conteudo, turma, curso)
                    values (null,?,?,?,?)");
                //executar o comando passando os valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->conteudo,
                    $this->turma,
                    $this->curso
                ));
                //var_dump($sql->errorInfo());
                //testar se retornou valores
                if ($sql->rowCount() > 0){
                    // se conseguiu gravr no banco de dados retornar para pagina index_disciplina
                    header("location: index_disciplina.php");
                }
            }else{ // se o usuario nao preencheu os valores devolver para o index_disciplina
                header("location: index_disciplina.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível inserir a disciplina: ".$msg->getMessage();
        }
    }

    public function excluir($numero){
        try{
            //verificar se recebeu a numero
            if (isset($numero)){
                //preencher o atributo com o valor enviado pelo formulario
                $this->numero = $numero;
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco
                $sql = $con->prepare("delete from disciplina where numero = ?");
                //executar o comando passando o pareamento numero
                $sql->execute(array($this->numero));
                //testar se retornou valors
                if ($sql->rowCount() > 0){
                    // se o disciplina foi excluido retornar para pagina index_disciplina
                    header("location: index_disciplina.php");
                }
            }else{ // se o usuario nao selecionou no codigo para exluir,
                //retornar para index_disciplina.php
                header("location: index_disciplina.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível excluir a disciplina: ".$msg->getMessage();
        }
    }

    public function alterar(){
        try{
            //verificar se recebeu valores do formulario
            if (isset($_POST['Salvar'])){
                $this->numero = $_GET["numero"];
                $this->nome = $_POST["nome"];
                $this->conteudo = $_POST["conteudo"];
                $this->turma = $_POST["turma"];
                $this->curso = $_POST["curso"];
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco passando parametros?
                $sql = $con->prepare("update disciplina set nome = ?, conteudo = ?, turma = ?, curso = ?, where numero = ?");
                //executar o comando passando valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->conteudo,
                    $this->turma,
                    $this->curso,
                    $this->numero
                ));
                //testar se retornou valors
                if ($sql->rowCount() > 0){
                    // se conseguiu alterar no banco de dados retornar para pagina index_disciplina
                    header("location: index_disciplina.php");
                }
            }else{ // se o usuario nao preencheu os valores devolver para index_disciplina.php
                header("location: index_disciplina.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível alterar a disciplina: ".$msg->getMessage();
        }
    }

    public function ListarID($numero){
        try{
            if(isset($numero)){
                $this->numero = $numero;
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco
                $sql = $con->prepare("select * from disciplina where numero = ?");
                //executar o comando
                $sql->execute(array($this->numero));
                //testar se retornou valores
                if ($sql->rowCount() > 0){
                    // se tem resultado devolver os dados do disciplina ao html
                    return $result = $sql->fetchObject();
                    // fetchAll -> linhas / colunas
                }
            }
        }catch (PDOException $msg){
            echo "Não foi possível listar a disciplina: ".$msg->getMessage();
        }
    }
}