<?php
	require_once("session.php");
	require_once("class.user.php");
	include "config_session.php";
	include "parameters.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

	<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
	
	
<!-- Bootstrap css 
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.min.css">
	<link href="jquery-ui-1.12.1/DataTable/DataTables-1.10.18/dataTables.bootstrap.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="style.css" type="text/css"  />
	<script src="jquery-ui-1.12.1/DataTable/DataTables-1.10.18/js/dataTables.bootstrap.js"></script>
	<script src="jquery-ui-1.12.1/DataTable/DataTables-1.10.18/js/jquery.bootstrap.js"></script>
	<script language="javascript" src="bootstrap/js/scripts.js"></script>
-->	
	<!-- 	SCRIPT JAVASCRIPT PARA CALENDARIO JQUERY -->
	<script >
	  $( function() {
		  $( "#datamov, #datamov, #datapicker, #data_i, #data_f" ).datepicker({
			altField: "#actualDate",
			dateFormat: "dd-mm-yy",
			altFormat: "dd-mm-YY",
			showWeek: true,	
			changeMonth: true,
			changeYear: true
		});
		$( ".selector" ).datepicker({
		altFormat: "dd-mm-yy",
		altField: "#actualDate"
		});
	  } );
	</script>
	<!-- 	SCRIPT JAVASCRIPT PARA DATATABLES CSS -->
	<title> welcome - <?php print($userRow['user_email']); ?></title>
</head>
<body> 
<!-- NAVBAR PRINCIPAL COM NOME DA CONTA, DATA ATUAL, MENU DA CONTA E MENU DO USUARIO -->
<nav class="navbar navbar-inverse navbar-fixed-top " >
	<div class="container">
		<div class="navbar-header" >
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"> ok</span>
			<span class="icon-bar"> vamos </span>
			<span class="icon-bar"> terá </span>
		  </button>
		  <a class="navbar-brand" href="http://www.localhost/Login-Signup-Pdo/home.php">Livro Caixa <?php print $accountRow['conta'] ?></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse" >
			<ul class="nav navbar-nav">
				<li><a href="?mes=<?php echo date('m')?>&ano=<?php echo date('Y')?>"><?php print "Hoje &eacute:"?><strong> <?php echo date('d')?> de <?php echo mostraMes(date('m'))?> de <?php echo date('Y')?></strong></a></li>	
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-user"></span>&nbsp;Conta: <?php echo $accountRow['idconta'] . "-" . $accountRow['conta']; ?>&nbsp;<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
					<li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
				  </ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
						<li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
					  </ul>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav> 

<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="indexc.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="indexc.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
					
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="indexc.html">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Education</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="indexc.html"><span class="mini-sub-pro">Dashboard v.1</span></a></li>
                                
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="indexc.html" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap"></span> <span class="mini-click-non">Data Tables</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Peity Charts" href="static-table.html"><span class="mini-sub-pro">Static Table</span></a></li>
                                <li><a title="Data Table" href="data-table.html"><span class="mini-sub-pro">Data Table</span></a></li>
                            </ul>
                        </li>
                        
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap"></span> <span class="mini-click-non">Pages</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a title="Login" href="login.html"><span class="mini-sub-pro">Login</span></a></li>
                                <li><a title="Register" href="register.html"><span class="mini-sub-pro">Register</span></a></li>
                                <li><a title="Password Recovery" href="password-recovery.html"><span class="mini-sub-pro">Password Recovery</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

	
<!-- SELECT DO ANO, LISTA DOS MESES MENUS DE ATALHO -->	
<div class="container-fluid" style="margin-top:50px; margin-left:120px; margin-right: 120px; padding: 0;">
	<div class="container-fluid" >
		<form class="form-inline">
			<div class="panel panel-primary">
				<div class="panel-body">
					<label for="ano">
						Ano:
					</label>
					<select class="form-control" id="sel1" onchange="location.replace('?mes=<?php echo $mes_hoje?>&ano='+this.value)">
						<?php
							for ($i=2004;$i<=2050;$i++){
							?>
							<option value="<?php echo $i?>" <?php if ($i==$ano_hoje) echo "selected=selected"?> ><?php echo $i?></option>
						<?php }?>
					</select>
					<label for="mes">
						Mes:
					</label>
					<div class="btn-group">
						<?php
							for ($i=1;$i<=12;$i++){
						?>
						<?php if($mes_hoje==$i){?>
						<!-- MES SELECIONADO -->
						<a href="?mes=<?php echo $i?>&ano=<?php echo $ano_hoje?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-calendar"></span>
						<?php }else{?>
						<!-- OUTROS MESES -->
						<a href="?mes=<?php echo $i?>&ano=<?php echo $ano_hoje?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-calendar"></span>
						<?php } ?>	
						<?php echo mostraMes($i);?>
						</a>
						<?php } ?>
					</div>
					<div class="btn-group">
						<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">Ir Para: <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="list_cat.php"> Adicionar Categorias </a></li>
							<li class="divider"></li>
							<li><a href="filtrarpordata.php"> Filtrar por Data </a></li>
							<li class="divider"></li>
							<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> profile</a></h5></li>
							<li class="divider"></li>
						</ul>
					</div>
					<button type="button" class="btn btn-sm btn-default" data-toggle="button">
						<strong><?php echo mostraMes($mes_hoje)?>/<?php echo $ano_hoje?></strong>
					</button>					
				</div>
			</div>
		</form>
	</div><!--   -->
</div>
<div class="container-fluid" style="margin-top:0px; margin-left:120px; margin-right: 120px; padding: 0;">
	  <?php //<!-- COMANDO PHP PARA MOSTRAR A TABELA DE DADOS  -->
	   include "form_meses.php";
	  ?>
</div>
<!--  BALANCOS MENSAL E ANUAL -->
<div class="container-fluid" style="margin-top:0px; margin-left:120px; margin-right: 120px; padding: 0;">
	  <?php //<!-- COMANDO PHP PARA MOSTRAR A TABELA DE DADOS  -->
	   include "balanco.php";
	  ?>
</div>
<!--  FORMULARIO DE FILTROS: DATAS, CATEGORIAS -->
<div class="container-fluid" style="margin-top:0px; margin-left:120px; margin-right: 120px; padding: 0;">	
	<div class="container-fluid" >
	<!-- FORMULARIO DE BUSCA, DATA INICIAL, DATA FINAL E FILTRO DE CATEGORIAS  -->
		<form class="form-inline" name="form_filtro_cat" method="POST" action="rel_pdf.php">
			<div class="panel panel-primary">
				<div class="panel-body">					
					Mês: <input type="text" name="mes" value="<?php echo $mes_hoje?>" class="form-control input-sm" size="1">
					Ano: <input type="text" name="ano" value="<?php echo $ano_hoje?>" class="form-control input-sm" size="1">
					Conta: <input type="text" name="conta" value="<?php echo $contapd?>" class="form-control input-sm" size="1">
					<button type="submit" class="btn btn-warning btn-sm" name="btn_pdf" ><span class="glyphicon glyphicon-check"></span> Imprimir em PDF </button>
					<button type="submit" name="gerar_pdf" class="btn btn-default btn-sm"  value="Filtrar" style="border: solid 1px; border-radius:1px; box-shadow: 1px 1px 1px 1px black; width:80px;" >Filtrar</button>	
					<a href="list_cat.php" class="btn btn-success btn-md">
						<span class="glyphicon glyphicon-pencil"></span> + Categoria
					</a>
					<a href="javascript:;" onclick="abreFecha('add_conta')" class="btn btn-success btn-md" >
						<span class="glyphicon glyphicon-pencil"></span> + Conta 
					</a>
					
				</div>
			</div>
		</form>
	</div>
	<!-- INICIO DA TABELA DE DADOS -->	
	<div class="container-fluid" >	
	  <?php //<!-- COMANDO PHP PARA MOSTRAR A TABELA DE DADOS  -->
	  include "table_home.php";
	  ?>
		<footer class="footer" border="1">
			<table class="table table-responsive table-bordered table-striped table-condensed table-hover" >
				<tr>
					<td style="width:420px;  text-align: right; " COLSPAN="4"><strong> A TRANSPORTAR TOTAIS DO DIA </strong></td>
					<td style=" text-align: center; "><?php echo formata_dinheiro($entradas_m); ?></td>
					<td style=" text-align: center; "><?php echo formata_dinheiro($saidas_m) ?></td>
					<td style=" text-align: center; "><?php echo $row['valor']; ?></td>
				</tr>
				<tr>
					<td style="width:420px; text-align: right; " COLSPAN="4"><strong> SALDO ANTERIOR </strong></td>
					<td style=" text-align: center; "></td>
					<td style=" text-align: center; "></td>
					<td style=" text-align: center; "><?php echo formata_dinheiro($saldoanterior) ?></td>
				</tr>
				<tr>
					<td style="width:420px; text-align: right; " COLSPAN="4"><strong> SALDO ATUAL </strong></td>
					<td style="text-align: center; "><?php echo formata_dinheiro($resultado_mes) ?></td>
					<td style="text-align: center; "></td>
					<td style="text-align: center; "></td>
				</tr>
			</table>	
		</footer>
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) <script src="assets/js/jquery.min.js"></script>-->
		<script src="jquery-ui-1.12.1/DataTable/DataTables-1.10.18/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="jquery-ui-1.12.1/DataTable/DataTables-1.10.18/js/bootstrap.min.js"></script>
		<!-- necessário para abrir os DataTables <script src="assets/js/dataTables/js/jquery.dataTables.js"></script>-->
		<script src="jquery-ui-1.12.1/DataTable/DataTables-1.10.18/js/jquery.dataTables.js"></script>
		
		<!--<script src="assets/js/dataTables/js/dataTables.bootstrap.js"></script>-->
		<script src="jquery-ui-1.12.1/DataTable/DataTables-1.10.18/js/dataTables.bootstrap.js"></script>
		<!-- necessário para abrir o calendario datepicker -->
		<script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
		<!-- necessário para abrir o calendario datepicker -->
		<link href="jquery-ui-1.12.1/DataTable/DataTables-1.10.18/css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
		
		<script type="text/javascript">
		  $(function () {
			// toolip
			$('[data-toggle="tooltip"]').tooltip();

			// datatables
			$('#tb_home').dataTable( {
				"dom": '<"top"fp<"clear">>rt<"bottom"il<"clear">>',
				"lengthMenu": [[4, 7, 10, 12, 15, 25, -1], [4, 7, 10, 12, 15, 25, "All"]],
				"pageLength": 7,
				"pagingType": "full_numbers",
				"paging": true,
				"ordering": true,
				"info":     true,
				"language": {
					"lengthMenu": "Mostrando _MENU_ registros por pagina",
					"zeroRecords": "Sem Registros!",
					"info": "Mostrando pagina _PAGE_ de _PAGES_ paginas.",
					"infoEmpty": "Sem Dados!",
					"infoFiltered": "(filtrado de _MAX_ total registros!)"
				}
			} );
		  })
		</script>
	</div>
	<div class="well well-sm">
        <form  class="form-inline">
            <div class="form-group">
                <input  type="email" class="form-control" id="emailField" placeholder="Enter email">
            </div>
            <div class="form-group">
                <input  type="password" class="form-control" id="passwordField" placeholder="Password">
            </div> 
        </form>
    </div>
</div>
</body>
</html>