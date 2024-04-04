<?php
// importar classe conexao
// include  / require -> diferenca:
// include -> importa o arquivo e apenas da mensagem de erro, nao quebra a execucao
// require -> importa o arquivo e da mensagem de erro, quebra a execucao
// once -> importa apenas uma unica vez

require_once "Conexao.php";

class Funcionario
{
// numero / Nome / Sexo / Email / Endereço Completo / Telefone / Senha
// atributos
    public $numero;
    public $nome;
    public $sexo;
    public $email;
    public $endereco;
    public $setor;
    public $telefone;
    public $senha;

// metodos
// metodo para listar todos funcionario ( select * from funcionario)
public function listarTodos(){
    //validar execucao do codigo
    try{
        //criar uma instancia da classe conexao
        $bd = new Conexao();
        //criar um objeto com a conexao ao PDO
        $con = $bd->conectar();

        // criar o comando sql para enviar ao banco de dados
        $sql = $con->prepare("select * from funcionario");

        //executar o comando
        $sql->execute();

        //testar se retornou resultados
        if ($sql->rowCount() > 0){
            //se tem resultados devolver os dados para o HTML
            return $result = $sql->fetchAll(PDO::FETCH_CLASS); // fetchALL -> devolve resultado no formato linhas/colunas
        }

    }catch (PDOException $msg){
        echo "Não foi possível listar os funcionario: ".$msg->getMessage();
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
                $this->setor = $_POST["setor"];
                $this->telefone = $_POST["telefone"];
                $this->senha = $_POST["senha"];
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco passando parametros ?
                $sql = $con->prepare("insert into funcionario(numero, nome, sexo, email, endereco, setor, telefone, senha)
                    values (null,?,?,?,?,?,?,?)");
                //executar o comando passando os valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->setor,
                    $this->telefone,
                    $this->senha
                ));
                //var_dump($sql->errorInfo());
                //testar se retornou valores
                if ($sql->rowCount() > 0){
                    // se conseguiu gravr no banco de dados retornar para pagina index_funcionario
                    header("location: index_funcionario.php");
                }
            }else{ // se o usuario nao preencheu os valores devolver para o index_funcionario
                header("location: index_funcionario.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível inserir o funcionario: ".$msg->getMessage();
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
                $sql = $con->prepare("delete from funcionario where numero = ?");
                //executar o comando passando o pareamento numero
                $sql->execute(array($this->numero));
                //testar se retornou valors
                if ($sql->rowCount() > 0){
                    // se o funcionario foi excluido retornar para pagina index_funcionario
                    header("location: index_funcionario.php");
                }
            }else{ // se o usuario nao selecionou no codigo para exluir,
                //retornar para index_funcionario.php
                header("location: index_funcionario.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível excluir o funcionario: ".$msg->getMessage();
        }
    }

    public function alterar(){
        try{
            //verificar se recebeu valores do formulario
            if (isset($_POST['Salvar'])){
                $this->numero = $_GET["numero"];
                $this->nome = $_POST["nome"];
                $this->sexo = $_POST["sexo"];
                $this->email = $_POST["email"];
                $this->endereco = $_POST["endereco"];
                $this->setor = $_POST["setor"];
                $this->telefone = $_POST["telefone"];
                $this->senha = $_POST["senha"];
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco passando parametros?
                $sql = $con->prepare("update funcionario set nome = ?, sexo = ?, email = ?, endereco = ?, setor = ?,
                                    telefone = ?, senha = ? where numero = ?");
                //executar o comando passando valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->setor,
                    $this->telefone,
                    $this->senha,
                    $this->numero
                ));
                //testar se retornou valors
                if ($sql->rowCount() > 0){
                    // se conseguiu alterar no banco de dados retornar para pagina index_funcionario
                    header("location: index_funcionario.php");
                }
            }else{ // se o usuario nao preencheu os valores devolver para index_funcionario.php
                header("location: index_funcionario.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível alterar o funcionario: ".$msg->getMessage();
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
                $sql = $con->prepare("select * from funcionario where numero = ?");
                //executar o comando
                $sql->execute(array($this->numero));
                //testar se retornou valores
                if ($sql->rowCount() > 0){
                    // se tem resultado devolver os dados do funcionario ao html
                    return $result = $sql->fetchObject();
                    // fetchAll -> linhas / colunas
                }
            }
        }catch (PDOException $msg){
            echo "Não foi possível listar o funcionario: ".$msg->getMessage();
        }
    }
}