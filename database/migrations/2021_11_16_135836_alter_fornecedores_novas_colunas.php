<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
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
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *  Reverte(desfaz) tudo aquilo que foi executado(criado,alterado) no método up().
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            /* Método "dropColumn()": Para remover uma coluna: */
            /* $table->dropColumn('uf'); */
            /* $table->dropColumn('email'); */
            /* Ou passando um array de colunas: */
            $table->dropColumn('uf', 'email');
        });
    }
    /* Obs: Comando "php artisan migrate" executa o método up() */
    /* Obs: Comando "php artisan migrate:rollback" executa o método down(),reverte as migrações. */

    /*  php artisan migrate
        Mais antiga para a amais atual */

    /*  php artisan migrate:rollback
        Da mais atual para a mais antiga */
}
