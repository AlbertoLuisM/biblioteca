<?php 
    $conexao = mysql_connect("localhost","root","");
    if (!$conexao){
        echo "Erro ao se conectar ao banco <br/>";
        exit;
    }

    $banco = mysql_select_db("bibliotecaweb");
    if (!$banco){
        echo "Erro";
        exit;
    }   

    $rs = mysql_query("Select * From usuario;");

    //$id = trim($_POST['id']);
    $nome = trim($_POST['txtNome']);
    

    if(!empty($nome)){
        $sql ="INSERT INTO cliente (nome, endereco, telefone, email)  VALUES ('$nome','$endereco','$telefone','$email'); ";
        $ins = mysql_query($sql);
        if(!$ins){
            echo "Erro 271325165214 não foi possível fazer o insert. ";
        }
    }
    else echo "Valor do campo em branco";

    if(!empty($endereco)){
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