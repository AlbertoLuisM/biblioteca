<?php
    $conexao =  mysql_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
    }
    
    $banco  = mysql_select_db("bibliotecaweb");
	if (!$banco){
		echo "Erro ao se conectar ao banco ...";
		exit;
    }
    $id = $_REQUEST['id']; 
    $rs = mysql_query("SELECT * FROM  Livro where id=".$id);
    $linha = mysql_fetch_array($rs); 
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Remover Livro</title>
    <link href="Arquivo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  </head>
  <body background = "remLivro.jpg" id="tela">
    <div class="container col-md-8" >
      <h1 id="p" class=" titulo" class="rectangle" class="rectangle:after" >Remover Livro</h1>
      <form id="frmRemLivro" name="frmRemLivro" method="GET" action="remLivro.php">
        <div id="p" class="form-group">
          <span class="text-xl font-weight-bold">ID: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['id']?> </span>
          <input type="hidden" id="id" name="id" value="<?php echo $linha['id']?>">
        </div>
        <div id="p" class="form-group">
          <span class="text-xl font-weight-bold">Nome: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['nome']?> </span>
        </div>
        <div id="p" class="form-group">
          <span class="text-xl font-weight-bold">Descrição: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['descricao']?> </span>
        </div>
        <div id="p" class="form-group">
          <span class="text-xl font-weight-bold">Autor: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['autor']?> </span>
        </div>
        <div id="p" class="form-group">
          <span class="text-xl font-weight-bold">Editora: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['editora']?> </span>
        </div>
        <div id="p" class="form-group">
          <span class="text-xl font-weight-bold">genero: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['genero']?> </span>
        </div>
        <div id="p" class="form-group">
          <span class="text-xl font-weight-bold">Valor: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['valor']?> </span>
        </div>
        <button id="btRem"  class="btn btn-lg btn-danger" type="submit"><i class="fas fa-minus-circle"></i></button>
        <a href="lstLivro.php" id="btVoltar" name="btVoltar" class="btn btn-lg btn-success"><i class="fas fa-chevron-left"></i></a>
         </form>
    </div>  
  </body>
</html>