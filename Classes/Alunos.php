<?php
// importar classe conexao
// include  / require -> diferenca:
// include -> importa o arquivo e apenas da mensagem de erro, nao quebra a execucao
// require -> importa o arquivo e da mensagem de erro, quebra a execucao
// once -> importa apenas uma unica vez

require_once "Conexao.php";

class Alunos
{
// Matricula / Nome / Sexo / Email / Endereço Completo / Telefone / Senha
// atributos
    public $matricula;
    public $nome;
    public $sexo;
    public $email;
    public $endereco;
    public $telefone;
    public $senha;

// metodos
// metodo para listar todos alunos ( select * from alunos)
    public function listarTodos()
    {
        //validar execucao do codigo
        try {
            //criar uma instancia da classe conexao
            $bd = new Conexao();
            //criar um objeto com a conexao ao PDO
            $con = $bd->conectar();

            // criar o comando sql para enviar ao banco de dados
            $sql = $con->prepare("select * from alunos");

            //executar o comando
            $sql->execute();

            //testar se retornou resultados
            if ($sql->rowCount() > 0) {
                //se tem resultados devolver os dados para o HTML
                return $result = $sql->fetchAll(PDO::FETCH_CLASS); // fetchALL -> devolve resultado no formato linhas/colunas
            }

        } catch (PDOException $msg) {
            echo "Não foi possível listar os alunos: " . $msg->getMessage();
        }
    }

    public function inserir(){
        try{
            //verificar se recebeu valores do formulario
            if (isset($_POST['nome']) && isset($_POST['sexo']) && isset($_POST['email']) && isset($_POST['endereco']) && isset($_POST['telefone']) && isset($_POST['senha'])){
                $this->nome = $_POST["nome"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->endereco = $_POST["endereco"];
                $this->telefone = $_POST["telefone"];
                $this->senha = $_POST["senha"];
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco passando parametros ?
                $sql = $con->prepare("insert into alunos(matricula, nome, sexo, email, endereco, telefone, senha)
                    values (null,?,?,?,?,?,?)");
                //executar o comando passando os valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->telefone,
                    $this->senha
                ));
                //var_dump($sql->errorInfo());
                //testar se retornou valores
                if ($sql->rowCount() > 0){
                    // se conseguiu gravr no banco de dados retornar para pagina index_alunos
                    header("location: index_aluno.php");
                }
            }else{ // se o usuario nao preencheu os valores devolver para o index_alunos
                header("location: index_aluno.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível inserir o aluno: ".$msg->getMessage();
        }
    }

    public function excluir($matricula){
        try{
            //verificar se recebeu a matricula
            if (isset($matricula)){
                //preencher o atributo com o valor enviado pelo formulario
                $this->matricula = $matricula;
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco
                $sql = $con->prepare("delete from alunos where matricula = ?");
                //executar o comando passando o pareamento matricula
                $sql->execute(array($this->matricula));
                //testar se retornou valors
                if ($sql->rowCount() > 0){
                    // se o aluno foi excluido retornar para pagina index_alunos
                    header("location: index_aluno.php");
                }
            }else{ // se o usuario nao selecionou no codigo para exluir,
                //retornar para index_alunos.php
                header("location: index_aluno.php");
            }
            }catch (PDOException $msg){
                echo "Não foi possível excluir o aluno: ".$msg->getMessage();
            }
    }

    public function alterar(){
        try{
            //verificar se recebeu valores do formulario
            if (isset($_POST['Salvar'])){
                $this->matricula = $_GET["matricula"];
                $this->nome = $_POST["nome"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->endereco = $_POST["endereco"];
                $this->telefone = $_POST["telefone"];
                $this->senha = $_POST["senha"];
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco passando parametros?
                $sql = $con->prepare("update alunos set nome = ?, sexo = ?, email = ?, endereco = ?,
                                    telefone = ?, senha = ? where matricula = ?");
                //executar o comando passando valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->telefone,
                    $this->senha,
                    $this->matricula
                ));
                //testar se retornou valors
                if ($sql->rowCount() > 0){
                    // se conseguiu alterar no banco de dados retornar para pagina index_alunos
                    header("location: index_aluno.php");
                }
            }else{ // se o usuario nao preencheu os valores devolver para index_alunos.php
                header("location: index_aluno.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível alterar o aluno: ".$msg->getMessage();
        }
    }

    public function ListarID($matricula){
        try{
            if(isset($matricula)){
                $this->matricula = $matricula;
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco
                $sql = $con->prepare("select * from alunos where matricula = ?");
                //executar o comando
                $sql->execute(array($this->matricula));
                //testar se retornou valores
                if ($sql->rowCount() > 0){
                    // se tem resultado devolver os dados do aluno ao html
                    return $result = $sql->fetchObject();
                    // fetchAll -> linhas / colunas
                }
            }
        }catch (PDOException $msg){
            echo "Não foi possível listar o aluno: ".$msg->getMessage();
        }
    }
}