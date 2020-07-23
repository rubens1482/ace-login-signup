<?php

require_once('config/dbconfig.php');

class ACCOUNT
{	
	private $conn;
//	FUN��O DE CONEX�O
	public function __construct()
	{
		$database = new Database();
		$dbs = $database->dbConnection();
		$this->conn = $dbs;
    }
//	FUN��O DE CONSULTA	
	public function SqlQuery($sqli)
	{
		$stmt = $this->conn->prepare($sqli);
		return $stmt;
	}
//	FUN��O DE REGISTRO	
	public function register($account,$prop,$pass_c)
	{
		try
		{
			$new_password = password_hash($pass_c, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO lc_contass(conta,proprietario,password) 
		                                               VALUES(:account, :prop, :pass)");
												  
			$stmt->bindparam(":account", $account);
			$stmt->bindparam(":prop", $prop);
			$stmt->bindparam(":pass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
//	FUN��O DE SELE��O	
	public function doLogin_c($account,$prop,$pass_c)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT idconta, conta, proprietario, password FROM lc_contass WHERE conta=:account OR proprietario=:prop ");
			$stmt->execute(array(':account'=>$account, ':prop'=>$prop));
			$accountRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($pass_c, $accountRow['password']))
				{
					$_SESSION['account_session'] = $accountRow['idconta'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
//	FUN��O DE VERIFICA��O LOGADO	
	public function is_loggedin_c()
	{
		if(isset($_SESSION['account_session']))
		{
			return true;
		}
	}
//	FUN��O DE REDIRECIONAMENTO	
	public function redirect($url)
	{
		header("Location: $url");
	}
//	FUN��O DE LOGOUT	
	public function doLogout_c()
	{
		unset($_SESSION['account_session']);
		return true;
	}
}
?>