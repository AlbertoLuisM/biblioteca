
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

    $rs = mysql_query("Select * From cliente;");
?>
<html>
<head>
    <meta charset="utf-8" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="Arquivo.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body background="lstCliente.jpg" id="tela">
<div  class="container" style="margin-top:110px;">
    	<div class="row">
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Lista de Clientes</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
						
							</span>
						</div>
                    </div>
                    <div class="panel-body">
                    <table class="table table-hover" id="dev-table" >

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="frminsCliente.html" class="btn btn-primary btn-xs pull-right"><b>+</b> Add Novo Cliente</a>
    <a href="index.html" id="btVoltar" name="btVoltar" class="btn btn-lg btn-success"><i class="fas fa-chevron-left"></i></a>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereco</th>
            <th>Telefone</th>
            <th>Ações<th>
        </tr>
    </thead>
         <?php while ($linha = mysql_fetch_array($rs)){?>
            <tr>
                <td><?php echo $linha ['id']?></td>
                <td><?php echo $linha ['nome']?></td>
                <td><?php echo $linha ['endereco']?></td>
                <td><?php echo $linha ['telefone']?></td>
                <td ><button id="bt-edt"  class="btn btn-lock btn-warning" onclick="javascript: location.href='frmEdtCliente.php?id='+<?php echo $linha['id']?>" value='Editar' > <i class="far fa-edit"></i></button>    </td>
        <?php 
    } ?>
            
    </table>
    </div>
</div>
</body>
