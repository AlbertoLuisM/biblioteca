<?php
    $conexao =  mysql_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
    }
    
    $banco  = mysql_select_db("bibliotecaweb");
	if (!$banco){
		echo "Erro ao se conectar ao banco estoque...";
		exit;
    }
    $id = trim($_POST['id']);
    $nome = trim($_POST['txtNome']);
    $descricao= trim($_POST['txtDescricao']);
    $genero= trim($_POST['txtGenero']);  
    $autor= trim($_POST['txtAutor']);
    $editora = trim($_POST['txtEditora']);
    $valor = trim($_POST['txtValor']); 
    
 
    if (!empty($descricao) && ($valor>0)){
      // $sql = "UPDATE produto set descricao=". $desc. ", quantidade=". $qtd. ",valor=" . $val . "WHERE id=" . $id.";"; 
       $sql = "UPDATE livro SET nome='$nome', descricao='$descricao', genero='$genero', autor='$autor', editora='$editora', valor='$valor' WHERE id='$id';";
       $ins = mysql_query($sql); 
       if(!$ins)
            echo ("Deu erro na edição"); 
    }
    else echo "Descrição em branco ou campo valor igual a zero"; 
    
    $valor = 'wllfl@ig.com.br';
    // Saída E-mail válido 
    header("location: lstLivro.php"); 

?>