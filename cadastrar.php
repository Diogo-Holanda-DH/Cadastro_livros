<?php
// cadastrar.php
include "conexao.php";

$livro = $_POST['id_livro'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$ano_publicacao = $_POST['ano_publicacao'];
$categoria = $_POST['categoria'];

// 1º Passo - Comando SQL
$sql = "INSERT INTO tb_livros
        (id_livro, titulo, autor, ano_publicacao, categoria,)
        VALUES
        ('$livro', '$titulo', '$autor', '$ano_publicacao', '$categoria')";
        
// 2º Passo - Preparar a conexão
$inserir = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $inserir->execute();
    echo "Cadastrado com sucesso"; 
}catch(PDOException $erro){
    echo "Falha ao inserir!". $erro->getMessage();
}

?>