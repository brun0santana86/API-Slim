<?php

use Slim\Http\Request;
use Slim\Http\Reponse;
use App\Models\Produto;
use App\Models\Usuario;
use Firebase\JWT\JWT;


//rota para geracao de token
$app->post('/api/token', function($request, $response){
	//dados para confirmar o cliente
		$dados = $request->getParsedBody();
		$email = $dados['email'] ?? null;
		$senha = $dados['senha'] ?? null;
		$usuario = Usuario::where('email', $email)->first();

		if(!is_null($usuario) && (md5($senha) === $usuario->senha)) {
			// gerar o token
			$secretKey = $this->get('settings')['secretKey'];
			$chaveAcesso = JWT::encode($usuario, $secretKey);

			return $response->withJson([
				'chave'=> $chaveAcesso
			]);

		}

			return $response->withJson([
				'status'=> 'ERRO'
			]);

});