<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //Sobrepondo a nomenclatura automática do eloquent a tabela
    //no banco de dados, com base no nome do modelo.
    //O nome da tabela então será 'fornecedores', conforme abaixo.
    //Atributo "$table":
    protected $table = 'fornecedores';

    //Autoriza o método estático "::create()" a fazer a inserção de registros
    //no banco de dados, através de um array associativo.
    //Atributo "#fillable":
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
