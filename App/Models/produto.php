<?php

//definindo nome para produto model
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//criando a classe
class Produto extends Model
{
	//autorizacao de campos que podem ser preenchidos na api pela classe
	//criando propriedade 
	protected $fillable = [
		'titulo', 'descricao', 'preco',
		'fabricante', 'updated_at', 'created_at'
	];
}