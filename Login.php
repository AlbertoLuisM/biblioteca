<?php
    $user = trim($_POST['UserName']);
    $pwd = trim($_POST['pwd']); 
    $md5 = md5($pwd);
    
    //echo "Usuario: " . $user . "<br/>"; 
    // echo "Senha: " .  $pwd . "<br/>"; 
    //echo "MD5('$pwd'): $md5 <br/>"; 
    $conexao =  mysql_connect("localhost","root",""); 
    if (!$conexao){
        echo "Erro ao se conectar MySql <br/>" ; 
        exit;
    }
 
    $banco  = mysql_select_db("bibliotecaweb");
    if (!$banco){
      echo "Erro ao se conectar a base de dados...";
         exit;
    }
 
    $rs = mysql_query("SELECT * FROM  usuario WHERE user LIKE '$user' ");
    $linha = mysql_fetch_array($rs); 
    $pwd = md5($pwd);
    if ($pwd==$linha['pwd']){
      //echo "Usuario e senha compativeis";
      session_start(); 
      $_SESSION['user'] = $user; 
      header('location:index.html');
    }
    else { //echo "Usuário e senha inválido";
           header('location: login.html'); 
         }
?>