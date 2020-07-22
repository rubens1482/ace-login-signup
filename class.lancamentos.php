<?php

require_once('dbconfig.php');
//
class MOVS
{	
	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function Lquery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	
	
	
	public function select_lc($mes,$ano,$idconta)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM lc_movimento WHERE mes=:mes and ano=:ano and idconta=:idconta");
			$stmt->execute(array(':id'=>$id, ':datamov'=>$datamov,':descricao'=>$descricao,':tipo'=>$tipo,':valor'=>$valor,':cat'=>$cat,':idconta'=>$idconta));
			$lc_Row=$stmt->fetch(PDO::FETCH_ASSOC);
			
			foreach($result as $value)
			{
				return($result);
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	//ENTRADAS DO ANO ANTERIOR
	public function entradas_aa($ano,$idconta,$tipo_e)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT sum(valor) as entradas_aa FROM lc_movimento WHERE idconta=:idconta and tipo=:tipo and year(datamov)<:ano");
			$stmt->execute(array(':ano'=>$ano,':idconta'=>$idconta,':tipo'=>$tipo_e));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			$entradas_aa = $row['entradas_aa'];
			//print $entradas_aa;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	//SAIDAS DO ANO ANTERIOR
	public function saidas_aa($ano,$idconta,$tipo_s)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT sum(valor) as saidas_aa FROM lc_movimento WHERE idconta=:idconta and tipo=:tipo and year(datamov)<:ano");
			$stmt->execute(array(':ano'=>$ano,':idconta'=>$idconta,':tipo'=>$tipo_s));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			$saidas_aa = $row['saidas_aa'];
			//print $saidas_aa;
			//print formata_dinheiro($saidas_aa);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function sel_mov_id($id)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM lc_movimento WHERE id=:id");
			$stmt->execute();
			$mov_Row=$stmt->fetchObject();
			
			$id = $mov_Row['id'];
			$tipo = $mov_Row['tipo'];
			$folha = $mov_Row['folha'];
			$cat = $mov_Row['cat'];
			$descricao = $mov_Row['descricao'];
			$valor = $mov_Row['valor'];
			$datamov = $mov_Row['datamov'];
			$idconta = $mov_Row['idconta'];
			
				
			{
				return($result);
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	
}
?>