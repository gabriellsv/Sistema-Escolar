<?php
// importar classe conexao
// include  / require -> diferenca:
// include -> importa o arquivo e apenas da mensagem de erro, nao quebra a execucao
// require -> importa o arquivo e da mensagem de erro, quebra a execucao
// once -> importa apenas uma unica vez

require_once "Conexao.php";

class Curso
{
// Matricula / Nome / Sexo / Email / Endereço Completo / Telefone / Senha
// atributos
    public $codigo;
    public $nome;
    public $serie;

// metodos
// metodo para listar todos alunos ( select * from alunos)
public function listarTodos(){
    //validar execucao do codigo
    try{
        //criar uma instancia da classe conexao
        $bd = new Conexao();
        //criar um objeto com a conexao ao PDO
        $con = $bd->conectar();

        // criar o comando sql para enviar ao banco de dados
        $sql = $con->prepare("select * from curso");

        //executar o comando
        $sql->execute();

        //testar se retornou resultados
        if ($sql->rowCount() > 0){
            //se tem resultados devolver os dados para o HTML
            return $result = $sql->fetchAll(PDO::FETCH_CLASS); // fetchALL -> devolve resultado no formato linhas/colunas
        }

    }catch (PDOException $msg){
        echo "Não foi possível listar os alunos: ".$msg->getMessage();
    }
}
    public function inserir(){
        try{
            //verificar se recebeu valores do formulario
            if (isset($_POST['nome']) && isset($_POST['serie'])){
                $this->nome = $_POST["nome"];
                $this->serie = $_POST["serie"];
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco passando parametros ?
                $sql = $con->prepare("insert into curso(codigo, nome, serie)
                    values (null,?,?)");
                //executar o comando passando os valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->serie
                ));
                //var_dump($sql->errorInfo());
                //testar se retornou valores
                if ($sql->rowCount() > 0){
                    // se conseguiu gravr no banco de dados retornar para pagina index_curso
                    header("location: index_curso.php");
                }
            }else{ // se o usuario nao preencheu os valores devolver para o index_curso
                header("location: index_curso.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível inserir o curso: ".$msg->getMessage();
        }
    }

    public function excluir($codigo){
        try{
            //verificar se recebeu a codigo
            if (isset($codigo)){
                //preencher o atributo com o valor enviado pelo formulario
                $this->codigo = $codigo;
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco
                $sql = $con->prepare("delete from curso where codigo = ?");
                //executar o comando passando o pareamento codigo
                $sql->execute(array($this->codigo));
                //testar se retornou valors
                if ($sql->rowCount() > 0){
                    // se o curso foi excluido retornar para pagina index_curso
                    header("location: index_curso.php");
                }
            }else{ // se o usuario nao selecionou no codigo para exluir,
                //retornar para index_curso.php
                header("location: index_curso.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível excluir o curso: ".$msg->getMessage();
        }
    }

    public function alterar(){
        try{
            //verificar se recebeu valores do formulario
            if (isset($_POST['Salvar'])){
                $this->codigo = $_GET["codigo"];
                $this->nome = $_POST["nome"];
                $this->serie = $_POST["serie"];
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco passando parametros?
                $sql = $con->prepare("update curso set nome = ?, serie = ?, where codigo = ?");
                //executar o comando passando valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->serie,
                    $this->codigo
                ));
                //testar se retornou valors
                if ($sql->rowCount() > 0){
                    // se conseguiu alterar no banco de dados retornar para pagina index_curso
                    header("location: index_curso.php");
                }
            }else{ // se o usuario nao preencheu os valores devolver para index_curso.php
                header("location: index_curso.php");
            }
        }catch (PDOException $msg){
            echo "Não foi possível alterar o curso: ".$msg->getMessage();
        }
    }

    public function ListarID($codigo){
        try{
            if(isset($codigo)){
                $this->codigo = $codigo;
                // instanciar classe conexao
                $bd = new Conexao();
                //criar o objeto contento a conexao
                $con = $bd->conectar();
                // cria o comando sql para enviar ao banco
                $sql = $con->prepare("select * from curso where codigo = ?");
                //executar o comando
                $sql->execute(array($this->codigo));
                //testar se retornou valores
                if ($sql->rowCount() > 0){
                    // se tem resultado devolver os dados do curso ao html
                    return $result = $sql->fetchObject();
                    // fetchAll -> linhas / colunas
                }
            }
        }catch (PDOException $msg){
            echo "Não foi possível listar o curso: ".$msg->getMessage();
        }
    }
}