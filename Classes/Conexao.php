<?php

class Conexao
{
    // atributos
    private  $servidor;
    private  $banco;
    private  $usuario;
    private  $senha;

    //metodos
    function __construct()
    {
        // definir os valores dos atributos
        $this->servidor = "localhost";
        $this->banco = "sistema_escolar2a2";
        $this->usuario = "root";
        $this->senha = "";
    }

    // metodos para conectar
    public function conectar(){
        // validacao da execucao do codigo
        try{
            // criar uma conexao com o PDO
            $con = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco.";charset=utf8;",$this->usuario,$this->senha);
            return $con;

        }catch (PDOException $msg){
            echo "Erro ao conectar com o banco de dados: ".$msg->getMessage();
        }
    }
}