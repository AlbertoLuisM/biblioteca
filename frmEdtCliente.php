<?php
    session_start();
    if (!isset($_SESSION['user'])) 
        Header("Location: ./login.html");
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
    echo "id= " + $id; 
    $rs = mysql_query("SELECT * FROM cliente  where id=".$id);
    $linha = mysql_fetch_array($rs); 
 //   echo $linha['descricao'] . " -  " . $linha['valor']; 
?>

<html>
    <head>
      <meta charset="utf-8">
      <title>Editar Cliente</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
      <link href="Arquivo.css" rel="stylesheet">
    </head>
    <body background="frmEdtCliente.png" id="tela" >
      <div class="container col-md-8" >
        <h1 id="p" class="titulo" clas="rectangle"  class="rectangle:after">Editar Cliente</h1>
           <form id="frmEdtCliente" name="frmEdtCliente" method="POST" action="edtCliente.php">
             <div class="form-group">
                 <label for="lblId">ID:</label> 
                 <input type="hidden" id="id" name="id" value="<?php echo $linha['id']?>">
             </div>
             <div class="form-group">
                 <label for="lblNome">Nome:</label>
                 <input type="text" id="txtNome" name="txtNome"class="form-control col-md-5" value="<?php echo $linha['nome']?>" required>
             </div>
             <div class="form-group">
                 <label for="lblEndereco">Endereco: </label>
                 <input type="text" id="txtEndereco" name="txtEndereco" class="form-control col-md-5" value="<?php echo $linha['endereco']?>" required>
             </div>
             <div class="form-group">
                 <label for="lblTelefone">Telefone: </label>
                 <input type="text" id="txtTelefone" name="txtTelefone" class="form-control col-md-5" value="<?php echo $linha['telefone']?>"required>
             </div>
             <div class="form-group" >
                 <label for="lblEmail">Email: </label>
                 <input type="text" id="txtEmail" name="txtEmail" class="form-control col-md-4"   value="<?php echo $linha['email']?>" required>
             </div>
             
             <button type="submit" id="btEnviar" name="btEnviar" 
                                        class="btn btn-success btn-lg" value="Atualizar"><i class="fas fa-sync-alt"></i></button>         
            <button type="reset" id="btLimpar" name="btLimpar"
                                        class="btn btn-warning btn-lg " value="Limpar" ><i class="fas fa-broom"></i></button>
            <a href="lstCliente.php" id="btVoltar" name="btVoltar" class="btn btn-lg btn-danger"><i class="fas fa-chevron-left"></i></a>

           </form>
      </div>
    </body>
</html>