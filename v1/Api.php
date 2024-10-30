<?php 

	require_once '../includes/DbOperation.php';

	function isTheseParametersAvailable($params){
	
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
		
			echo json_encode($response);
			
		
			die();
		}
	}
	
	
	$response = array();
	

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createAlunos':
				
				isTheseParametersAvailable(array('rmAluno', 'nomeAluno', 'email', 'senha', 'modulo'));
				
				$db = new DbOperation();
				
				$result = $db->createAlunos(
					$_POST['rmAluno'],
					$_POST['nomeAluno'],
					$_POST['email'],
					$_POST['senha'],
					$_POST['modulo']
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Aluno adicionado com sucesso';

					
					$response['alunos'] = $db->getAlunos();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getAlunos':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['alunos'] = $db->getAlunos();
			break; 
			
			
		
			case 'updateAlunos':
				isTheseParametersAvailable(array('codAluno','rmAluno', 'nomeAluno', 'email', 'senha', 'modulo'));
				$db = new DbOperation();
				$result = $db->updateAluno(
					$_POST['codAluno'],
					$_POST['rmAluno'],
					$_POST['nomeAluno'],
					$_POST['email'],
					$_POST['senha'],
					$_POST['modulo']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Aluno atualizado com sucesso';
					$response['alunos'] = $db->getAlunos();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deleteAlunos':

				
				if(isset($_GET['codAluno'])){
					$db = new DbOperation();
					if($db->deleteAlunos($_GET['codAluno'])){
						$response['error'] = false; 
						$response['message'] = 'Aluno excluído com sucesso';
						$response['alunos'] = $db->getAlunos();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um código por favor';
				}
			break; 

		//TESTE OUTRA TABELA

			

		//produtos

			case 'createProdutos':
				
				isTheseParametersAvailable(array('nomeProd', 'quant', 'quantEstoque', 'mult', 'valorProd', 'validade', 'dataEntrada', 'descricao'));
				
				$db = new DbOperation();
				
				$result = $db->createProdutos(
					$_POST['nomeProd'],
					$_POST['quant'],
					$_POST['quantEstoque'],
					$_POST['mult'],
					$_POST['valorProd'],
					$_POST['validade'],
					$_POST['dataEntrada'],
					$_POST['descricao']
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Produto adicionado com sucesso';

					
					$response['produto'] = $db->getProdutos();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getProdutos':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['produto'] = $db->getProdutos();
			break; 
			
			
		
			case 'updateProdutos':
				isTheseParametersAvailable(array('codProd','nomeProd', 'quant', 'quantEstoque', 'mult', 'valorProd', 'validade', 'dataEntrada', 'descricao'));
				$db = new DbOperation();
				$result = $db->updateProdutos(
					$_POST['codProd'],
					$_POST['nomeProd'],
					$_POST['quant'],
					$_POST['quantEstoque'],
					$_POST['mult'],
					$_POST['valorProd'],
					$_POST['validade'],
					$_POST['dataEntrada'],
					$_POST['descricao']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Produto atualizado com sucesso';
					$response['produto'] = $db->getProdutos();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deleteProdutos':

				
				if(isset($_GET['codProd'])){
					$db = new DbOperation();
					if($db->deleteProdutos($_GET['codProd'])){
						$response['error'] = false; 
						$response['message'] = 'Produto excluído com sucesso';
						$response['produto'] = $db->getProdutos();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um código por favor';
				}
			break; 

		//Pratos

			case 'createPratos':
				
				isTheseParametersAvailable(array('nomePrato', 'precoPrato', 'pesoPrato', 'codProd'));
				
				$db = new DbOperation();
				
				$result = $db->createPratos(
					$_POST['nomePrato'],
					$_POST['precoPrato'],
					$_POST['pesoPrato'],
					$_POST['codProd']
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Prato adicionado com sucesso';

					
					$response['prato'] = $db->getPratos();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getPratos':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['prato'] = $db->getPratos();
			break; 
			
			
		
			case 'updatePratos':
				isTheseParametersAvailable(array('codPrato','nomePrato', 'precoPrato', 'pesoPrato', 'codProd'));
				$db = new DbOperation();
				$result = $db->updatePratos(
					$_POST['codPrato'],
					$_POST['nomePrato'],
					$_POST['precoPrato'],
					$_POST['pesoPrato'],
					$_POST['codProd']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Prato atualizado com sucesso';
					$response['prato'] = $db->getPratos();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deletePratos':

				
				if(isset($_GET['codPrato'])){
					$db = new DbOperation();
					if($db->deletePratos($_GET['codPrato'])){
						$response['error'] = false; 
						$response['message'] = 'Prato excluído com sucesso';
						$response['prato'] = $db->getPratos();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um código por favor';
				}
			break; 
		

		//CARDAPIO
			case 'createCardapio':
				
				isTheseParametersAvailable(array('semana', 'nomePrato', 'nomeProduto', 'precoPrato', 'codAluno', 'codProf', 'codPrato'));
				
				$db = new DbOperation();
				
				$result = $db->createCardapio(
					$_POST['semana'],
					$_POST['nomePrato'],
					$_POST['nomeProduto'],
					$_POST['precoPrato'],
					$_POST['codAluno'],
					$_POST['codProf'],
					$_POST['codPrato']
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Cardápio adicionado com sucesso';

					
					$response['cardapio'] = $db->getCardapio();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getCardapio':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['cardapio'] = $db->getCardapio();
			break; 
			
			
		
			case 'updateCardapio':
				isTheseParametersAvailable(array('codCardapio','semana', 'nomePrato', 'nomeProduto', 'precoPrato', 'codAluno', 'codProf', 'codPrato'));
				$db = new DbOperation();
				$result = $db->updateCardapio(
					$_POST['codCardapio'],
					$_POST['semana'],
					$_POST['nomePrato'],
					$_POST['nomeProduto'],
					$_POST['precoPrato'],
					$_POST['codAluno'],
					$_POST['codProf'],
					$_POST['codPrato']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Cardápio atualizado com sucesso';
					$response['cardapio'] = $db->getCardapio();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deleteCardapio':

				
				if(isset($_GET['codCardapio'])){
					$db = new DbOperation();
					if($db->deleteCardapio($_GET['codCardapio'])){
						$response['error'] = false; 
						$response['message'] = 'Cardápio excluído com sucesso';
						$response['cardapio'] = $db->getCardapio();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um código por favor';
				}
			break; 
		}
			


	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}
	

	echo json_encode($response);