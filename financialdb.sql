CREATE TABLE contabancaria (
  id INT PRIMARY KEY AUTO_INCREMENT,
  descricao VARCHAR(100) NOT NULL,
  saldoInicial FLOAT(10,2) NOT NULL
);
  
  CREATE TABLE mov_financeira (
	id INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(7) NOT NULL,
    valor FLOAT(10,2) NOT NULL,
    data_movimentacao DATETIME NOT NULL,
    conta_bancaria INT,
    FOREIGN KEY(conta_bancaria) REFERENCES contabancaria(id)
  );

SET FOREIGN_KEY_CHECKS=0; -- to disable them
#SET FOREIGN_KEY_CHECKS=1; -- to re-enable them

INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Banco do Brasil Poupança', 1000);
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Caixa Conta Corrente', 600);
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Bradesco Conta Corrente', 2500);
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Caixa Poupança', 500.99);
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Santander Conta Corrente', 700);
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Santander Poupança', 558);  
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Itaú Unibanco Poupança', 1200); 
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Citibank Brasil Conta Corrente', 3100);
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Citibank Brasil Poupança', 300);
INSERT INTO contabancaria(descricao, saldoInicial) VALUES('Itaú Unibanco Poupança', 700);
  
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Receita', 1000, NOW(), 1);
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Despesa', 250, NOW(), 1);
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Despesa', 300.55, NOW(), 2);
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Despesa', 299.99, NOW(), 3);
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Receita', 2399.9, NOW(), 4);
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Receita', 5200, NOW(), 5);
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Receita', 3200, NOW(), 6); 
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Despesa', 500, NOW(), 7); 
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Despesa', 50.36, NOW(), 8);
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Despesa', 32.45, NOW(), 9);
INSERT INTO mov_financeira(tipo, valor, data_movimentacao, conta_bancaria) VALUES('Despesa', 62.49, NOW(), 10);
 

  

  

  
  
  
  
  
  
  