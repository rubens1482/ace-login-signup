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