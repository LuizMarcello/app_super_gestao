<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovaColunaSiteComAfter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Método "table()": Seleciona uma tabela já criada no bd, para "alterações" */
        Schema::table('fornecedores', function (Blueprint $table) {
            /* Métodos de criação das colunas, dependendo dos seus tipos. */
            /* Utilizando o modificador de colunas "after", para posicionar
               a nova coluna após a coluna "nome", já existente.
               Utilizando também o modificador "nullable" encadeado. */
            $table->string('site', 150)->after('nome')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropColumn('site');
        });
    }
}
