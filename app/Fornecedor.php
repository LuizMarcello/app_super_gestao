<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //Sobrepondo a nomenclatura automática do eloquent a tabela
    //no banco de dados, com base no nome do modelo.
    //O nome da tabela então será 'fornecedores', conforme abaixo.
    protected $table = 'fornecedores';
}
