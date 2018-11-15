<?php
    $conexao =  mysql_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
    }
    
    $banco  = mysql_select_db("bibliotecaweb");
	if (!$banco){
		echo "Erro ao se conectar ao banco...";
		exit;
    }

    $nome = trim($_POST['txtNome']);
    $descricao = trim($_POST['txtDescricao']);
    $genero = trim($_POST['txtGenero']);
    $autor = trim($_POST['txtAutor']);
    $editora = trim($_POST['txtEditora']);  
    $valor = trim($_POST['txtValor']); 

    if (!empty($descricao) && ($valor)>0){
       $sql = "INSERT INTO livro (nome, descricao, genero, autor, editora ,valor) VALUES  ('$nome','$descricao', '$genero', '$autor', '$editora', '$valor');";
       $ins = mysql_query($sql); 
       if(!$ins)
            echo "Deu erro na consulta de inserir Livro"; 
    }
    else echo "Descrição em branco ou  campo valor igual a zero"; 
    
         header("location: lstLivro.php"); 
?>