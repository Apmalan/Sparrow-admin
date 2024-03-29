<?php
require_once realpath(dirname(__FILE__,2).'/config/config.php');
class CategoriaModel {
    public static function listarTodos(){
        
        $conexao = Database::getConection();
        $sql = "SELECT * FROM categorias";
        
        $resultado = $conexao->query($sql) or 
        die ("Erro ao listar todas as categorias").mysql_error();
        if($resultado){
            return $resultado;
        }else{
            return false;
        }
    }
    public function incluir($dados){
        var_dump($dados);
        $conexao = Database::getConection();

        $nome = $dados['txtNomeCategoria'];
        $novo = $conexao->prepare("INSERT INTO categorias (nome) VALUES (?)");
        //Mescla o valor da váriavel lá no comando SQL Prepare onde você colocou
        $novo->bind_param('s',$nome);
        //Grava no banco
        $novo->execute();
        if($novo->affected_rows > 0){
            //$id = mysqli_stmt_insert_id($novo);
            header('Location: categorias.php');
            
        }else {
            return "Erro ao gravar no banco de dados";
        }
    }
    public function alterar($dados){
        var_dump($dados);
        $conexao = Database::getConection();
    
        $nome = $dados['txtAlterarNomeCategoria'];
        $novo = $conexao->prepare("UPDATE `categorias` SET `nome`=(?)");
        //Mescla o valor da váriavel lá no comando SQL Prepare onde você colocou
        $novo->bind_param('s',$nome);
        //Grava no banco
        $novo->execute();
        if($novo->affected_rows > 0){
            //$id = mysqli_stmt_insert_id($novo);
            header("Location: categorias.php");
            
        }else {
            return "Erro ao gravar no banco de dados";
        }
    }

    public function exluir($dados){
        var_dump($dados);
        $conexao = Database::getConection();
    
        $nome = $dados['txtDeletarCategoria'];
        $novo = $conexao->prepare("DELETE `categorias` SET `nome`=(?)");
        //Mescla o valor da váriavel lá no comando SQL Prepare onde você colocou
        $novo->bind_param('s',$nome);
        //Grava no banco
        $novo->execute();
        if($novo->affected_rows > 0){
            //$id = mysqli_stmt_insert_id($novo);
            header("Location: categorias.php");
            
        }else {
            return "Erro ao gravar no banco de dados";
        }
    }

    }




//Nas classes de model você criar esse IF que servira como hub direcionando
//um post ou get para uma determinada function
if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // aqui é onde vai decorrer a chamada se houver um *request* POST    
    $categorias = new CategoriaModel;
    var_dump($_POST);
    $acao = ($_POST['acao']);
     if($acao == "insert"){
         print_r("entrou insert");
         $categorias->incluir($_POST);                
     }if($acao == "update"){
         print_r("entrou update");
        $categorias->alterar($_POST);
 }if($acao == "delete"){
    print_r("entrou delete");
   $categorias->deletar($_POST);
}
}