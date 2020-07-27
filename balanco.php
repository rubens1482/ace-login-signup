﻿
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xd-12">	
		<div class="panel panel-primary" >
			<!--  CABEÇALHO DOS BALANCOS -->
			<div class="panel-heading"  >
				BALANCOS DE MOVIMENTO
			</div>
			<!--  INICIO DO CORPO DO BALANCO -->
			<div class="panel-body" >
				<div class="row">
					<!--  BALANÇO MENSAL -->
					<div class="col-sm-6" style=" border-top: 1px dashed #f00; border-bottom: 1px dashed #f00;">
						<!--  SALDO ANTERIOR  BALANÇO MENSAL -->
						<div class="row" >
							<div class="col-sm-12" style="text-align: left; border-bottom: 1px dashed #f00;" >
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>">BALANCO MENSAL</span></strong>
							</div>
						</div>
						<div class="row" >
							<div class="col-sm-6" style="text-align: left;" >
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>">Saldo Anterior:</span></strong>
							</div>
							<div class="col-sm-6" style=" text-align: right;">
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>"><?php print formata_dinheiro($saldo_ant) ?></span></strong>
							</div>
						</div>
						<!--  ENTRADAS BALANÇO MENSAL -->
						<div class="row">
							<div class="col-sm-6" style="text-align: left;">
								<strong><span style="font-size:14px; color:<?php echo "#0000FF" ?>">Entradas:</span></strong>
							</div>
							<div class="col-sm-6" style=" text-align: right;">
								<strong><span style="font-size:14px; color:<?php echo "#0000FF" ?>"><?php print formata_dinheiro($entradas_m) ?></span></strong>
							</div>
						</div>
						<!--  SAIDAS BALANÇO MENSAL -->
						<div class="row">
							<div class="col-sm-6" style=" text-align: left; border-bottom: 1px dashed #f00;">
								<strong><span style="font-size:14px; color:<?php echo "#C00" ?>">Saidas:</span></strong>
							</div>
							<div class="col-sm-6" style=" text-align: right; border-bottom: 1px dashed #f00;">
								<strong><span style="font-size:14px; color:<?php echo "#C00" ?>"><?php print formata_dinheiro($saidas_m) ?></span></strong>
							</div>
							
						</div>
						<!--  SALDO ATUAL BALANÇO MENSAL  -->
						
						<div class="row">
							<div class="col-sm-6" style=" text-align: left;">
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>">Saldo Atual:</span></strong>
							</div>
							<div class="col-sm-6" style=" text-align: right;">
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>"><?php print formata_dinheiro($resultado_mes) ?></span></strong>
							</div>
						</div>		
					</div>
					<!--  FIM DO BALANCO MENSAL -->
					<!-- INICIO DO BALANÇO ANUAL  -->	
					<div class="col-sm-6" style=" border-top: 1px dashed #f00; border-bottom: 1px dashed #f00;">
						
						<div class="row" >
							<div class="col-sm-12" style="text-align: left; border-bottom: 1px dashed #f00;" >
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>">BALANCO ANUAL</span></strong>
							</div>
						</div>
						<!--  SALDO ANTERIOR  BALANÇO ANUAL -->
						<div class="row">
							<div class="col-sm-6" style=" text-align: left;">
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>">Saldo Anterior:</span></strong>
							</div>
							<div class="col-sm-6" style=" text-align: right;">
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>"><?php print formata_dinheiro($saldo_aa) ?></span></strong>
							</div>
						</div>
						<!--  ENTRADAS  BALANÇO ANUAL -->
						<div class="row">
							<div class="col-sm-6" style=" text-align: left;">
								<strong><span style="font-size:14px; color:<?php echo "#0000FF" ?>">Entradas:</span></strong>
							</div>
							<div class="col-sm-6" style=" text-align: right;">
								<strong><span style="font-size:14px; color:<?php echo "#0000FF" ?>"><?php print formata_dinheiro($ent_acab) ?></span></strong>
							</div>
						</div>
						<!--  SAIDAS BALANÇO ANUAL -->
						<div class="row">
							<div class="col-sm-6" style=" text-align: left; border-bottom: 1px dashed #f00;">
								<strong><span style="font-size:14px; color:<?php echo "#C00" ?>">Saidas:</span></strong>
							</div>
							<div class="col-sm-6" style=" text-align: right; border-bottom: 1px dashed #f00;">
								<strong><span style="font-size:14px; color:<?php echo "#C00" ?>"><?php print formata_dinheiro($sai_acab) ?></span></strong>	
							</div>
						</div>
						<!--  SALDO ATUAL BALANÇO ANUAL -->
						<div class="row">
							<div class="col-sm-6" style=" text-align: left;">
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>">Saldo Atual:</span></strong>
							</div>
							<div class="col-sm-6" style=" text-align: right;">
								<strong><span style="font-size:14px; color:<?php echo "#006400" ?>"><?php print formata_dinheiro($saldo_acab) ?></span></strong>
							</div>
						</div>
					</div>
					<!--  FIM DO BALANCO ANUAL -->
				</div>
				<div class="row">
					<hr style="border-top: 1px dashed #8c8b8b;">
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xd-12">
						<form class="form-inline">
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
							<a href="#modal_pdf" class="btn btn-sm btn-success " name="add_mov" data-toggle="modal">
								<i class="glyphicon glyphicon-plus"></i> pdf
							</a>
							<a href="#addmov" class="btn btn-sm btn-success " name="add_mov" data-toggle="modal" style="border: solid 1px; border-radius: 1px; box-shadow: 1px 1px 1px 1px black; border-radius:3px 3px 3px 3px;">
								<i class="glyphicon glyphicon-plus"></i> Novo
							</a>
							<a href="list_cat.php" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span>Decline</a>
						</form>	
					</div>
				</div>
				<?php include "add_mov.php" ?>
			</div>
			<!--  INICIO DO RODAPÉ DO BALANCO -->
			
			<!--  FIM DO RODAPÉ DO BALANCO -->
		</div>	
	</div>
<div>