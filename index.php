<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1 id="form_cadastro" >Cadastre seu Livro:</h1>
<div id="formulario">
<br>
<form action="inserir.php" method="post">
    <label>LIVRO: </label><br>
    <input type="text" name="id_livro"> <br><br>

    <label>TÍTULO: </label><br>
    <input type="text" name="titulo" > <br><br>

    <label>AUTOR:</label><br>
    <input type="text" name="autor"> <br><br>

    <label>ANO_PUBICAÇÃO:</label><br>
    <input type="date" name="ano_publicacao"> <br><br>
   
    <label>CATEGORIA:</label><br>
    <input type="number" name="categoria"> <br><br>

    <button type="submit">Cadastrar></button>

</form>
</div>
<h1 id="livros_cadastrados">Livros Cadastrado </h1>
<div id="lista">
<?php
include "conexao.php";
// 1º Passo - Comando SQL
$sql = "SELECT * FROM tb_livros";

// 2° Passo - Preparar conexao
$consultar = $pdo->prepare($sql);

// 3º Passo - Tentar executar e mostrar na página
try {
    $consultar->execute();
    $resultado = $consultar->fetchall(PDO::FETCH_ASSOC);
    foreach($resultado as $item){
        $livro = $item['id_livro'];
        $titulo = $item['titulo'];
        $autor = $item['autor'];
        $ano_publicacao = $item['ano_publicacao'];
        $categoria = $item['categoria'];
      
        echo "
        <div class='cartoes'>
            <h1> Livro: $livro </h1> <br>
            <p> Titulo: $titulo </p>
            <p> Autor: $autor </p>
            <p> Ano publicação: $ano_publicacao </p>
            <p> Categoria: $categoria </p>
            
            <a href='editar.php?cod=$livro'>
                <button>✏️Editar</button>
            </a>
            
            <a href='deletar.php?cod=$livro'>
                <button>🗑️Deletar</button>
            </a>
        </div>
    ";
    }
}catch(PDOException $erro){
    echo "Falha ao consultar".$erro->getMessage();
}

?>
</div>
</body>
</html>
