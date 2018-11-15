<?php
   /* session_start();
    if (!isset($_SESSION['user'])) 
        Header("Location: ./login.html");*/
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
   $id = $_REQUEST['id']; 
//    echo "id= " + $id; 
    $rs = mysql_query("SELECT * FROM LIVRO  where id=".$id);
    $linha = mysql_fetch_array($rs); 
 //   echo $linha['descricao'] . " -  " . $linha['valor']; 
?>

<html>
    <head>
      <meta charset="utf-8">
      <title>Editar Livro</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
      <link href="Arquivo.css" rel="stylesheet">
    </head>
    <body background="edtLivro.jpg" id="tela">
      <div class="container col-md-8">
        <h1 id="p" class="titulo" clas="rectangle"  class="rectangle:after">Editar Livro</h1>
           <form id="frmEdtLivro" name="frmEdtLivro" method="POST" action="edtLivro.php">
             <div id="p" class="form-group">
                 <label for="lblId">ID:</label> 
                 <input type="hidden" id="id" name="id" value="<?php echo $linha['id']?>">
             </div>
             <div id="p" class="form-group">
                 <label for="lblNome">Nome:</label>
                 <input type="text" id="txtNome" name="txtNome"class="form-control col-md-5" value="<?php echo $linha['nome']?>">
             </div>
             <div id="p" class="form-group">
                 <label for="lblDescricao">Descrição: </label>
                 <input type="text" id="txtDescricao" name="txtDescricao" class="form-control col-md-5" value="<?php echo $linha['descricao']?>">
             </div>
             <div id="p" class="form-group">
                 <label for="lblGenero">Genero: </label>
                 <input type="text" id="txtGenero" name="txtGenero" class="form-control col-md-5" value="<?php echo $linha['genero']?>">
             </div>
             <div id="p" class="form-group">
                 <label for="lblAutor">Autor: </label>
                 <input type="text" id="txtAutor" name="txtAutor" class="form-control col-md-4" value="<?php echo $linha['autor']?>">
             </div>
             <div id="p" class="form-group">
                 <label for="lblEditora">Editora: </label>
                 <input type="text" id="txtEditor" name="txtEditora" class="form-control col-md-4" value="<?php echo $linha['editora']?>">
             </div>
             <div id="p" class="form-group">
                 <label for="lblValor">Valor: </label>
                 <input type="text" id="txtValor" name="txtValor" class="form-control col-md-3" value="<?php echo $linha['valor']?>">
             </div>
             <input type="submit" id="btEnviar" name="btEnviar" 
                                        class="btn btn-success btn-lg" value="Atualizar">         
            <input type="reset" id="btLimpar" name="btLimpar"
                                        class="btn btn-warning btn-lg" value="Limpar">
            <input type="button" id="bt_Cancel" name="bt_Cancel"
                                        class="btn btn-danger btn-lg" value="Cancelar"
                                        onclick="javascript:location.href='lstLivro.php'">

           </form>
      </div>
    </body>
</html>