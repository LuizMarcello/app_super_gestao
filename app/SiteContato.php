<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    /* Quais atributos do objeto podem ser preenchidos em
       massa, quando usar "fill()" ou "create()" no controller */
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem'];
}
