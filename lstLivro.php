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

    $rs = mysql_query("SELECT * FROM livro;");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="Arquivo.css">
</head>
 <body background="lstLivro.png">
   
    <div  class="container" style="margin-top:50px">
    	<div class="row">
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Listagem de Livros</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
						
							</span>
						</div>
                    </div>
                    <div class="panel-body">
                    <table class="table table-hover" id="dev-table" >
    <thead>
    <a href="frmInsLivro.html" class="btn btn-primary btn-xs pull-right " ><b>+</b> Add Novos Livros</a>
    <a href="index.html" id="btVoltar" name="btVoltar" class="btn btn-lg btn-success"><i class="fas fa-chevron-left"></i></a>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Genero</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>Valor</th>
            <th>Operações</th>
            
        </tr>
    </thead>
        <?php while ($linha = mysql_fetch_array($rs)){?>
            <tr>
                <td><?php echo $linha ['id']?></td>
                <td id="celula1"><?php echo $linha ['nome']?></td>
                <td><?php echo $linha ['descricao']?></td>
                <td id="celula2"><?php echo $linha ['genero']?></td>
                <td id="celula2"><?php echo $linha ['autor']?></td>
                <td id="celula3"><?php echo $linha ['editora']?></td>
                <td><?php echo number_format( $linha ['valor'],2,',','.')?></td>
                <td>
                <button id="bt-edt"  class="btn btn-lock btn-danger" onclick="javascript:location.href='frmEdtLivro.php?id='+<?php echo $linha['id']?>" value='Editar' > <i class="far fa-edit"></i></button>
                
                <button id="bt-rem" class="btn btn-lock btn-success" onclick="javascript:location.href='frmRemLivro.php?id='+<?php echo $linha['id']?>" value='Remover' ><i class="fas fa-broom"></i></button>
            </tr>

        <?php }?>

    </table>
   
 </body>
</html>