<?php
require '../config/Conn.php';

class ContaBancariaConn
{
	private $conn;
	
	public function __construct()
	{
		$this->conn = new Conn();
	}

	public function incluir($descricao, $saldoInicial)
	{
		$sql = "INSERT INTO contabancaria(descricao, saldoInicial) VALUES(:descricao, :saldoInicial)";
		$result = $this->conn->getConn()->prepare($sql);
		$result->bindParam(":descricao", $descricao);
		$result->bindParam(":saldoInicial", $saldoInicial);
		$result->execute();
	}

	public function listarContas()
	{
		$sql = "SELECT * FROM contabancaria";
		$result = $this->conn->getConn()->prepare($sql);
		$result->execute();
		return $result->fetchAll();
	}

	public function listarConta($id)
	{
		if(self::pesquisarId($id) == true) {
			$sql = "SELECT * FROM contabancaria WHERE id=:id";
			$result = $this->conn->getConn()->prepare($sql);
			$result->bindParam(":id", $id);
			$result->execute();

			if($result->rowCount() > 0) {
				$conta = $result->fetch();
				return $conta;
			} 
		} else {
			return false;
		}	
	}

	public function remover($id)
	{
		$sql = "DELETE FROM contabancaria WHERE id=:id";
		$result = $this->conn->getConn()->prepare($sql);
		$result->bindParam(":id", $id);
		$result->execute();
	}

	public function alterarConta($id, $descricao, $saldoInicial)
	{
		$sql = "UPDATE contabancaria SET descricao=:descricao, saldoInicial=:saldoInicial WHERE id=:id";
		$result = $this->conn->getConn()->prepare($sql);
		$result->bindParam(":id", $id);
		$result->bindParam(":descricao", $descricao);
		$result->bindParam(":saldoInicial", $saldoInicial);
		$result->execute();
	}

	private function pesquisarId($id)
	{
		$sql = "SELECT * FROM contabancaria WHERE id=:id";
		$result = $this->conn->getConn()->prepare($sql);
		$result->bindParam(":id", $id);
		$result->execute();
		if($result->rowCount() > 0) {
			return true;	
		} else {
			return false;
		}
	}
}