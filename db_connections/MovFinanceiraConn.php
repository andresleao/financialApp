<?php
require_once '../config/Conn.php';

class MovFinanceiraConn
{
	private $conn;
	
	public function __construct()
	{
		$this->conn = new Conn();
	}

	public function incluirMovFinanceira($tipo, $valor, $conta_bancaria)
	{
		
		if($this->pesquisarID($conta_bancaria)){
		    $consulta = "INSERT INTO mov_financeira(tipo,valor,data_movimentacao,conta_bancaria) VALUES(:tipo,:valor,NOW(),:conta_bancaria)";
		    $resultado = $this->conn->getConn()->prepare($consulta);
		    $resultado->bindParam(':tipo', $tipo);
		    $resultado->bindParam(':valor', $valor);
		    $resultado->bindParam(':conta_bancaria', $conta_bancaria);
		    $resultado->execute();
		    return true;
		}
	}

	public function pesquisarID($conta_bancaria)
	{
		$sql = "SELECT * FROM mov_financeira WHERE conta_bancaria = :conta_bancaria";
		$result = $this->conn->getConn()->prepare($sql);
		$result->bindParam(':conta_bancaria', $conta_bancaria);
		$result->execute();
	    
	    if($result->rowCount() > 0){
	    	return true;
	    }else {
	    	return false;
	    }
	}

	public function listarMovFinanceiras()
	{
		$sql = "SELECT mov_financeira.id, mov_financeira.conta_bancaria, mov_financeira.tipo, mov_financeira.valor, mov_financeira.data_movimentacao, contabancaria.descricao
		    FROM mov_financeira 
		    INNER JOIN contabancaria
	        ON mov_financeira.conta_bancaria = contabancaria.id
	        ORDER BY mov_financeira.conta_bancaria";
		$result = $this->conn->getConn()->prepare($sql);
		$result->execute();
		return $result->fetchAll();
	}

	public function listarMovFinanceira($id)
	{
        $sql = "SELECT mov_financeira.id, contabancaria.descricao , mov_financeira.tipo, mov_financeira.valor, mov_financeira.data_movimentacao, mov_financeira.conta_bancaria
		    FROM mov_financeira 
		    INNER JOIN contabancaria
	        ON mov_financeira.id = contabancaria.id
	        WHERE mov_financeira.id=:id";
		
		$result = $this->conn->getConn()->prepare($sql);
		$result->bindParam(":id", $id);
		$result->execute();

		if($result->rowCount() > 0)
		{
			return $result->fetch();
		}
	}

	public function removerMovFinanceira($id)
	{
		$sql = "DELETE FROM mov_financeira WHERE id=:id";
		$result = $this->conn->getConn()->prepare($sql);
		$result->bindParam(":id", $id);
		$result->execute();
	}

	public function alterarMovFinanceira($id, $tipo, $valor)
	{
		$sql = "UPDATE mov_financeira 
				SET tipo=:tipo, valor=:valor
				WHERE id=:id";	
		$result = $this->conn->getConn()->prepare($sql);
		$result->bindParam(":id", $id);
		$result->bindParam(":tipo", $tipo);
		$result->bindParam(":valor", $valor);
		$result->execute();
	}
}
