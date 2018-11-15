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
    $endereco =trim($_POST['txtEndereco']);
    $telefone = trim($_POST['txtTelefone']);
    $email =trim($_POST['txtEmail']);
 
    if (!empty($nome)){
      // $sql = "UPDATE produto set descricao=". $desc. ", quantidade=". $qtd. ",valor=" . $val . "WHERE id=" . $id.";"; 
       $sql = "UPDATE cliente SET nome='$nome', endereco='$endereco', telefone='$telefone', email='$email' WHERE id='$id';";
       $ins = mysql_query($sql); 
       if(!$ins)
            echo ("Deu erro na edição"); 
    }
    else echo "Descrição em branco ou campo valor igual a zero";

    if(empty($nome)){
        echo "Prencha este campo."
    }

    if(empty($endereco)){
        echo "Preenchar o campo de endereço.";
    }

    if(is_numeric($telefone)) 
    {
    echo "Preencha o campo telefone somente com números.";
    }
    else echo "Campo em branco.";

    if(strlen($email)<8 || !strstr($email,'@'))
    {
    echo "Favor digitar seu email corretamente";    
    }
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)):
        echo 'E-mail válido.';
    else:
        echo 'E-mail inválido.';
    endif; 

 
    
    header("location: lstCliente.php"); 

?>