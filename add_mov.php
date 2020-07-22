<?php
require_once("config/session.php");
$account_id = $_SESSION['account_session'];
	
$stmt = $auth_account->SqlQuery("SELECT * FROM lc_contass WHERE idconta=:idconta");
$stmt->execute(array(":idconta"=>$account_id));

$accountRow=$stmt->fetch(PDO::FETCH_ASSOC);
$contapd = $accountRow['idconta'];
?>
<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.min.css">
<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="jQuery-Mask-Plugin-v1.7.7-0/jquery.mask.min.js"></script>
<script>
  $( function() {
	  $( "#datamov, #datapicker, #data_i, #data_f" ).datepicker({
		altField: "#actualDate",
		dateFormat: "dd-mm-yy",
		altFormat: "dd-mm-YY",
		showWeek: true,	
		changeMonth: true,
		changeYear: true,
		changeDay: true
	});
	$( ".selector" ).datepicker({
	altFormat: "dd-mm-yy",
	altField: "#actualDate"
	});
  } );
  $ (function() {
	  $("#valor").mask('#,##0.00', {reverse: true});
  }
</script>

<!-- Add New -->
    <div class="modal fade" id="addmov" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Nova Categoria</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form class="form-inline" method="POST" action="addnew.php">
				
					<div class="row">
						<div class="col-lg-2" >
							<label class="control-label" style="position:relative; top:7px; text-align: right;">Tipo:</label>
						</div>
						<div class="col-lg-10">
							<select name="tipo"  id="tipo" type="number" class="form-control input-sm">
							  <option value="0">saida</option>
							  <option value="1">entrada</option>
							</select>
						</div>
					</div>
					<div style="height:10px;"></div>
					
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Folha:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="folha">
							<input type="text" class="form-control" name="hoje" value="<?php echo $dia_hoje;?>-<?php echo $mes_hoje;?>-<?php echo $ano_hoje;?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Categoria:</label>
						</div>
						<div class="col-lg-10">
							<?php
								$pdo = new Database();
								$db = $pdo->dbConnection();
								$stmt = $db->prepare("SELECT id, nome, operacao FROM lc_cat ORDER BY nome");
								$stmt->execute();
								$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
								if ($stmt->rowCount() > 0) { 	
							?>		
							<select name="cat"  type="text" class="form-control input-sm" >
								<?php foreach ($result as $row) { ?>
								
							  <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?> - <?php echo $row['id']; ?></option>
								<?php } ?>
							</select>
								<?php } ?>									
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Descricao:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="descricao">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Valor:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="valor" id="valor">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Data:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="datamov" id="datamov" value="<?php echo $dia_hoje;?>-<?php echo $mes_hoje;?>-<?php echo $ano_hoje;?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Conta:</label>
						</div>
						<div class="col-lg-10">
						<?php
							$pdo = new Database();
							$db = $pdo->dbConnection();
							$stmt = $db->prepare("SELECT idconta, conta FROM lc_contass ");
							$stmt->execute();
							$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
							if ($stmt->rowCount() > 0) { 
						?>	
						<select name="idconta"  class="form-control input-sm" type="text">
								<?php foreach ($result as $row) : ?>
							<option <?php if($accountRow['idconta']==$row['idconta']) echo "selected"?> value="<?php echo $row['idconta']; ?>"><?php echo $row['idconta']; ?> - <?php echo $row['conta']; ?></option>
								<?php endforeach ?>		
						</select>		
						</div>
						<?php } ?>	
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="btn_addmov" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>
