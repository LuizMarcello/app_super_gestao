<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresSoftdelete extends Migration
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
            $table->softDeletes();
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

            $table->dropSoftDeletes();
        });
    }
}
