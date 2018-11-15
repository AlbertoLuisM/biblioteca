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
    $id = trim($_REQUEST['id']);
  
 
    if (!empty($id)){
       $sql = "DELETE from livro where id= '$id';";
       $rem = mysql_query($sql); 
       if(!$rem)
            echo ("Deu erro remover produto"); 
    }
    else echo "Campo id igual a zero"; 
    
     header("location: lstLivro.php"); 
?>