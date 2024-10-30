<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }
	
	
	function createAluno($rmAluno, $nomeAluno, $email, $senha, $modulo){
		$stmt = $this->con->prepare("INSERT INTO tbAlunos (rmAluno, nomeAluno, email, senha, modulo) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $rmAluno, $nomeAluno, $email, $senha, $modulo);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getAlunos(){
		$stmt = $this->con->prepare("SELECT codAluno, rmAluno, nomeAluno, email, senha, modulo FROM tbAlunos");
		$stmt->execute();
		$stmt->bind_result($codAluno, $rmAluno, $nomeAluno, $email, $senha, $modulo);
		
		$tbAlunos = array(); 
		
		while($stmt->fetch()){
			$Aluno  = array();
			$Aluno['cod'] = $codAluno; 
			$Aluno['rm'] = $rmAluno; 
			$Aluno['nome'] = $nomeAluno; 
			$Aluno['email'] = $email; 
			$Aluno['senha'] = $senha; 
			$Aluno['modulo'] = $modulo; 

			array_push($tbAlunos, $Aluno); 
		}
		
		return $tbAlunos; 
	}
	
	
	function updateAluno ($codAluno, $rmAluno, $nomeAluno, $email, $senha, $modulo){
		$stmt = $this->con->prepare("UPDATE tbAlunos SET rm = ?, nome = ?, email = ?, senha = ?, modulo = ? WHERE codAluno = ?");
		$stmt->bind_param("ssssi", $rmAluno, $nomeAluno, $email, $senha, $modulo, $codAluno);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deleteAluno($codAluno){
		$stmt = $this->con->prepare("DELETE FROM tbAlunos WHERE cod = ? ");
		$stmt->bind_param("i", $codAluno);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function createProf($nomePrf, $email, $senha){
		$stmt = $this->con->prepare("INSERT INTO tbProfessores (nomeProf, emailProf, senha) VALUES (?, ?, ?)");
		$stmt->bind_param("ssis", $nomeProf, $emailProf, $senha);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getProf(){
		$stmt = $this->con->prepare("SELECT codProf, nomeProf, emailProf, senha FROM tbProfessores");
		$stmt->execute();
		$stmt->bind_result($codProf, $nomeProf, $emailProf, $senha);
		
		$tbProfessores = array(); 
		
		while($stmt->fetch()){
			$Professor  = array();
			$Professor['cod'] = $codProf; 
			$Professor['nome'] = $nomeProf; 
			$Professor['email'] = $emailProf; 
			$Professor['senha'] = $senha; 
		

			array_push($tbProfessores, $Professor); 
		}
		
		return $tbProfessores; 
	}
	
	
	function updateProf ($codProf, $nomeProf, $emailProf, $senha){
		$stmt = $this->con->prepare("UPDATE tbProfessores SET nome = ?, email = ?, senha = ? WHERE cod = ?");
		$stmt->bind_param("ssisi", $nomeProf, $emailProf, $senha, $codProf);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deleteProf($codProf){
		$stmt = $this->con->prepare("DELETE FROM tbProfessores WHERE cod = ? ");
		$stmt->bind_param("i", $codProf);
		if($stmt->execute())
			return true; 
		return false; 
	}


		function createProdutos ($nomeProd, $quant, $mult, $valorProd, $validade, $dataEntrada){
		$stmt = $this->con->prepare("INSERT INTO tbProdutos (nomeProd, quant, valorProd, validade, dataEntrada) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("issssi", $nomeProd, $quant, $mult, $valorProd, $validade, $dataEntrada);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getProdutos(){
		$stmt = $this->con->prepare("SELECT codProd, nomeProd, quant, mult, valorProd, validade, dataEntrada FROM tbProdutos");
		$stmt->execute();
		$stmt->bind_result($codProd, $nomeProd, $quant, $mult, $valorProd, $validade, $dataEntrada);
		
		$tbProdutos = array(); 
		
		while($stmt->fetch()){
			$Produtos  = array();
			$Produtos['cod'] = $codProd; 
			$Produtos['nome'] = $nomeProd; 
			$Produtos['quant'] = $quant; 
			$Produtos['mult'] = $mult; 
			$Produtos['valor'] = $valorProd; 
			$Produtos['validade'] = $validade; 
			$Produtos['dataEntrada'] = $dataEntrada;

			array_push($tbProdutos, $Produtos); 
		}
		
		return $tbProdutos; 
	}
	
	
	function updateProdutos ($codProd, $nomeProd, $quant, $mult, $valorProd, $validade, $dataEntrada){
		$stmt = $this->con->prepare("UPDATE tbProdutos SET nome = ?, quant = ?, mult = ?, valor = ?, validade = ?, dataEntrada = ? WHERE cod = ?");
		$stmt->bind_param("ssisi", $nomeProf, $quant, $mult, $valorProd, $validade, $dataEntrada, $codProd);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deleteProdutos($codProd){
		$stmt = $this->con->prepare("DELETE FROM tbProdutos WHERE cod = ? ");
		$stmt->bind_param("i", $codProd);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function createPratos ($nomePrato, $precoPrato, $pesoPrato, $codProd){
		$stmt = $this->con->prepare("INSERT INTO tbPratos (nomePrato, precoPrato, pesoPrato, codProd) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssis", $nomePrato, $precoPrato, $pesoPrato, $codProd);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getPratos(){
		$stmt = $this->con->prepare("SELECT codPrato, nomePrato, precoPrato, pesoPrato, codProd FROM tbPratos");
		$stmt->execute();
		$stmt->bind_result($codPrato, $nomePrato, $precoPrato, $pesoPrato, $codProd);
		
		$tbProdutos = array(); 
		
		while($stmt->fetch()){
			$Pratos  = array();
			$Pratos['cod'] = $codPrato; 
			$Pratos['nome'] = $nomePrato; 
			$Pratos['preco'] = $precoPrato; 
			$Pratos['peso'] = $pesoPrato; 
			$Pratos['codProd'] = $codProd; 


			array_push($tbPratos, $Pratos); 
		}
		
		return $tbPratos; 
	}
	
	
	function updatePratos ($codPrato, $nomePrato, $precoPrato, $pesoPrato, $codProd){
		$stmt = $this->con->prepare("UPDATE tbPratos SET nome = ?, preco = ?, peso = ?, codProd = ? WHERE cod = ?");
		$stmt->bind_param("ssisi", $nomePrato, $precoPrato, $pesoPrato, $codProd);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deletePratos($codPrato){
		$stmt = $this->con->prepare("DELETE FROM tbPratos WHERE cod = ? ");
		$stmt->bind_param("i", $codPrato);
		if($stmt->execute())
			return true; 
		return false; 
	}

		function createCardapio ($semana, $nomePrato, $nomeProd, $precoPrato, $codAluno, $codProf, $codPrato){
		$stmt = $this->con->prepare("INSERT INTO tbCardapio (semana, nomePrato, nomeProd, precoPrato, codAluno, codProf, codPrato) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssis", $semana, $nomePrato, $nomeProd, $precoPrato, $codAluno, $codProf, $codPrato);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getCardapio(){
		$stmt = $this->con->prepare("SELECT codCardapio, semana, nomePrato, nomeProd, precoPrato, codAluno, codProf, codPrato FROM tbCardapio");
		$stmt->execute();
		$stmt->bind_result($codCardapio, $semana, $nomePrato, $nomeProd, $precoPrato, $codAluno, $codProf, $codPrato);
		
		$tbCardapio = array(); 
		
		while($stmt->fetch()){
			$Cardapio  = array();
			$Cardapio['cod'] = $codCardapio; 
			$Cardapio['semana'] = $semana; 
			$Cardapio['nomePrato'] = $nomePrato; 
			$Cardapio['nomeProd'] = $nomeProd; 
			$Cardapio['preco'] = $precoPrato; 
			$Cardapio['codAluno'] = $codAluno; 
			$Cardapio['codProf'] = $codProf;
			$Cardapio['codPrato'] = $codPrato;

			array_push($tbCardapio, $Cardapio); 
		}
		
		return $tbCardapio; 
	}
	
	
	function updateCardapio ($cod, $semana, $nomePrato, $nomeProd, $preco, $codAluno, $codProf, $codPrato){
		$stmt = $this->con->prepare("UPDATE tbCardapio SET semana = ?, nomePrato = ?, nomeProd = ?, preco = ?, codAluno = ?, codProf = ?, codPrato WHERE cod = ?");
		$stmt->bind_param("ssisi",  $semana, $nomePrato, $nomeProd, $precoPrato, $codAluno, $codProf, $codPrato);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deleteCardapio($codCardapio){
		$stmt = $this->con->prepare("DELETE FROM tbCardapio WHERE cod = ? ");
		$stmt->bind_param("i", $codCardapio);
		if($stmt->execute())
			return true; 
		return false; 
	}
}