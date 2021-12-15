<?php
if (PHP_SAPI != 'cli') {
	exit('Rodar via CLI');
    
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

//get para recupar o db
$db = $container->get('db');
//schema sendo criado
$schema = $db->schema();
$tabela = ('produtos');
// criacao da tabela, usando variavel
$schema->dropIfExists( $tabela );
//criar a tabela de produtos
$schema->create($tabela, function($table){

		$table->increments('id');
		$table->string('titulo', 100);
		$table->text('descricao');
		$table->decimal('preco', 11,2);
		$table->string('fabricante', 60);
		$table->timestamps();


});

//preenche tabela
$db->table($tabela)->insert([
		'titulo'=> 'Iphone 12 ProMax 256gb',
		'descricao'=> 'Tela 6.1" IOS 14 5G Cam 14MP - Apple',
		'preco'=> 5999.90,
		'fabricante'=> 'Apple',
		'created_at'=>'2021-12-15',
		'updated_at'=>'2021-12-15'
]);

//preenche tabela
$db->table($tabela)->insert([
		'titulo'=> 'Iphone X Cinza Espacial 128gb',
		'descricao'=> 'Tela 5.8" IOS 14 5G Cam 12MP - Apple',
		'preco'=> 3999.90,
		'fabricante'=> 'Apple',
		'created_at'=>'2021-12-15',
		'updated_at'=>'2021-12-15'
]);


