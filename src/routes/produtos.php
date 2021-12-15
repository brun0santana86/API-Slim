<?php

use Slim\Http\Request;
use Slim\Http\Reponse;
use App\Models\Produto;
//Routes
//grupos de rotas com a versao 1 para possivei atualizacoes de versoes
$app->group('/api/v1', function(){
	//criando a rota para listar produtos
	$this->get('/produtos/lista', function($request, $response){
		//ORM mapeador de ojeto relacional
		$produtos = Produto::get(); 
		return $response->withJson($produtos);

	});

	//criando a rota para adicionar produtos
	$this->post('/produtos/adiciona', function($request, $response){
		//ORM mapeador de ojeto relacional
		$dados = $request->getParsedBody();
		$produto = Produto::create($dados);
		return $response->withJson($produto);

	});

	// recuperar produto para um determinado ID
	$this->get('/produtos/lista/{id}', function($request, $response, $args){
		

		$produto = Produto::findOrFail($args['id']); 
		return $response->withJson($produto);

	});

	// atualiza produto para um determinado ID
	$this->put('/produtos/atualiza/{id}', function($request, $response, $args){
		// recuperar os dados para ser atualizado
		$dados = $request->getParsedBody();
		$produto = Produto::findOrFail($args['id']); 
		$produto->update($dados);
		return $response->withJson($produto);

	});

	// remover produto para um determinado ID
	$this->get('/produtos/remove/{id}', function($request, $response, $args){
		
		
		$produto = Produto::findOrFail($args['id']); 
		$produto->delete();
		return $response->withJson($produto);

	});

});