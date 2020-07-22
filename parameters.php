<?php
$pdo = new Database();
$db = $pdo->dbConnection();

if (isset($_GET['dia'])) 
		$dia_hoje = $_GET['dia'];
	else
		$dia_hoje = date('d');

	if (isset($_GET['mes']))
		$mes_hoje = $_GET['mes'];
	else
		$mes_hoje = date('m');

	if (isset($_GET['ano']))
		$ano_hoje = $_GET['ano'];
	else
		$ano_hoje = date('Y');
//$primeiro_dia = date("01", mktime(0,00,0,$mes_hoje,'01',$ano_hoje));
//$ultimo_dia = date("t", mktime(0,00,0,$mes_hoje,'01',$ano_hoje));

include "functions.php";

$dia = 01;
$mes = $mes_hoje;
$ano = $ano_hoje;
$datainicial = date("$dia-$mes-$ano");
$datafinal = date("t-$mes-$ano");
// ENTRADAS ANO ANTERIOR
	$stmt = $db->prepare("SELECT sum(valor) as entradas_aa FROM lc_movimento WHERE idconta='$contapd' && tipo=1 && year(datamov)<'$ano_hoje'");
	$stmt->execute();
	$qreaa=$stmt->fetch(PDO::FETCH_ASSOC);
	$entradas_aa = $qreaa['entradas_aa'];
	//echo "Entradas Ano Anterior: " . formata_dinheiro($entradas_aa);
	// echo "<br>----------------------------------------------------";
// SAIDAS ANO ANTERIOR
	$stmt = $db->prepare("SELECT sum(valor) as saidas_aa FROM lc_movimento WHERE idconta='$contapd' && tipo=0 && year(datamov)<'$ano_hoje'");
	$stmt->execute();
	$qrsaa=$stmt->fetch(PDO::FETCH_ASSOC);
	$saidas_aa = $qrsaa['saidas_aa'];
	//echo "Saidas Ano Anterior: " . formata_dinheiro($saidas_aa);
	// echo "<br>";	
// SALDO ANO ANTERIOR	
	$saldo_aa = $entradas_aa-$saidas_aa;
	
// ENTRADAS DO MÊS SELECIONADO
	$stmt = $db->prepare("SELECT SUM(valor) as entradas_m FROM lc_movimento WHERE idconta=$contapd && tipo=1 && month(datamov)='$mes_hoje' && year(datamov)='$ano_hoje'");
	$stmt->execute();
	$qrems=$stmt->fetch(PDO::FETCH_ASSOC);
	$entradas_m = $qrems['entradas_m'];
	// echo "<br>Entradas ". $mes_hoje ."/". $ano_hoje . ": "  . formata_dinheiro($entradas_m);
// SAIDAS DO MÊS SELECIONADO
	$stmt = $db->prepare("SELECT SUM(valor) as saidas_m FROM lc_movimento WHERE idconta=$contapd && tipo=0 && month(datamov)='$mes_hoje' && year(datamov)='$ano_hoje'");
	$stmt->execute();
	$qrsms=$stmt->fetch(PDO::FETCH_ASSOC);
	$saidas_m = $qrsms['saidas_m'];
	// echo "<br>Saidas " . $mes_hoje ."/". $ano_hoje . ": " .  formata_dinheiro($saidas_m);
// SALDO MÊS SELECIONADO
	$saldo_m = $entradas_m-$saidas_m;
	
// ENTRADAS ACUMULADO DO ANO
	if ($mes_hoje == 1){
		$stmt = $db->prepare("SELECT SUM(valor) as ent_aca FROM lc_movimento WHERE idconta=$contapd && tipo=1 && year(datamov)<'$ano_hoje'");
	} else {
		$stmt = $db->prepare("SELECT SUM(valor) as ent_aca FROM lc_movimento WHERE idconta=$contapd && tipo=1 && month(datamov)<'$mes_hoje' && year(datamov)='$ano_hoje'");
	}
	$stmt->execute();
	$qreaca=$stmt->fetch(PDO::FETCH_ASSOC);
	$ent_aca = $qreaca['ent_aca'];
// SAIDAS ACUMULADO DO ANO	
	if ($mes_hoje == 1){
		$stmt = $db->prepare("SELECT SUM(valor) as sai_aca FROM lc_movimento WHERE idconta=$contapd && tipo=0 && year(datamov)<'$ano_hoje'");
	} else {
		$stmt = $db->prepare("SELECT SUM(valor) as sai_aca FROM lc_movimento WHERE idconta=$contapd && tipo=0 && month(datamov)<'$mes_hoje' && year(datamov)='$ano_hoje'");
	}
	$stmt->execute();
	$qrsaca=$stmt->fetch(PDO::FETCH_ASSOC);
	$sai_aca = $qrsaca['sai_aca'];
	// echo "<br>Saidas Acumuladas antes de " . $mes_hoje ."/". $ano_hoje . ": " .  formata_dinheiro($sai_aca);	
// SALDO ACUMULADO DO ANO $sai_aca
	$saldo_aca = $ent_aca-$sai_aca;
	
// ENTRADAS GERAL CONTA
	$stmt = $db->prepare("SELECT SUM(valor) as entradas_g FROM lc_movimento WHERE idconta='$contapd' && tipo=1");
	$stmt->execute();
	$qregc=$stmt->fetch(PDO::FETCH_ASSOC);
	$entradas_g = $qregc['entradas_g'];
// SAIDAS GERAL CONTA
	$stmt = $db->prepare("SELECT SUM(valor) as saidas_g FROM lc_movimento WHERE idconta='$contapd' && tipo=0");
	$stmt->execute();
	$qrsgc=$stmt->fetch(PDO::FETCH_ASSOC);
	$saidas_g = $qrsgc['saidas_g'];
// SALDO GERAL CONTA
	
	
// ENTRADAS BALANCO ANUAL
	$stmt = $db->prepare("SELECT SUM(valor) as ent_acab FROM lc_movimento WHERE idconta='$contapd' and tipo=1 and month(datamov)<='$mes_hoje' and year(datamov)='$ano_hoje'");
	$stmt->execute();
	$qreacab=$stmt->fetch(PDO::FETCH_ASSOC);
	$ent_acab = $qreacab['ent_acab'];
// SAIDAS BALANÇO ANUAL
	$stmt = $db->prepare("SELECT SUM(valor) as sai_acab FROM lc_movimento WHERE idconta='$contapd' and tipo=0 and month(datamov)<='$mes_hoje' and year(datamov)='$ano_hoje'");
	$stmt->execute();
	$qrsacab=$stmt->fetch(PDO::FETCH_ASSOC);
	$sai_acab = $qrsacab['sai_acab'];
// SALDO BALANÇO ANUAL
	$saldo_acab = $saldo_aa+$ent_acab-$sai_acab;
// SALDO ANTES DA DATA INICIAL
		
	$stmt = $db->prepare("SELECT SUM(valor) as entradas_ep FROM lc_movimento WHERE idconta='$contapd' && tipo=1 && datamov>='$datainicial' && datamov<='$datafinal'");
	$stmt->execute();
	$qreep=$stmt->fetch(PDO::FETCH_ASSOC);
	$entradas_ep=$qreep['entradas_ep'];
	
	$stmt = $db->prepare("SELECT SUM(valor) as saidas_ep FROM lc_movimento WHERE idconta='$contapd' && tipo=1 && datamov>='$datainicial' && datamov<='$datafinal'");
	$stmt->execute();
	$qrsep=$stmt->fetch(PDO::FETCH_ASSOC);
	$saidas_ep=$qrsep['saidas_ep'];
// DEFINIÇÃO DO FILTRO PARA ENTRADA ANTERIOR POR PERIODO
if (isset($_GET["filtrarvarios"])){
	
	$datainicial = $_GET['data_i'];
	$datafinal = $_GET['data_f'];

// ENTRADAS ANTES DA DATA INICIAL
	$stmt = $db->prepare("SELECT SUM(valor) as entradas_di FROM lc_movimento WHERE idconta='$contapd' and tipo=1 and datamov<'$datainicial' ");
	$stmt->execute();
	$qredi=$stmt->fetch(PDO::FETCH_ASSOC);
	$entradas_di=$qreapp['entradas_di'];
	echo $entradas_di;
// SAIDA ANTES DA DATA INICIAL
	$stmt = $db->prepare("SELECT SUM(valor) as saidas_di FROM lc_movimento WHERE idconta='$contapd' && tipo=0 && datamov<'$datainicial'");
	$stmt->execute();
	$qrsdi=$stmt->fetch(PDO::FETCH_ASSOC);
	$saidas_di=$qrsdi['saidas_di'];
// SALDO ANTERIOR A DATA INICIAL
	$saldo_di = $entradas_di-$saidas_di;		
}else{
//$datainicial = date("$primeiro_dia-$mes-$ano");
$datainicial = date("Y-m-d");
//$datafinal = date("$ultimo_dia-$mes-$ano");
$datafinal = date("Y-m-d");
}
// SALDO ANTERIOR CASO O MÊS SEJA JANEIRO OU OUTROS MESES...
	if ($mes_hoje == 1){
		$saldo_ant=$saldo_aa;
	} else {
		$saldo_ant=$saldo_aca+$saldo_aa;
	}
	
	if ($mes_hoje == 1){
		$resultado_mes=$saldo_aa+$saldo_m;
	} else {
		$resultado_mes=$saldo_aa+$saldo_aca+$saldo_m;
	}	
?>