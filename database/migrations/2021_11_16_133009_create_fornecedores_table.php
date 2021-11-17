<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Método "create()": Cria uma nova tabela no bd. */
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Reverte(desfaz) tudo aquilo que foi executado(criado,alterado) no método up().
     * @return void
     */
    public function down()
    {
        /* Método "dropIfExists()": Remove um schema(tabela), caso ela exista. */
        /* Obs: Com este também dá para testar a existência da tabela antes de remover */
        Schema::dropIfExists('fornecedores');
        /* Ou método "drop()": Remove sem testar a existência: */
        /* Schema::drop('fornecedores'); */
    }

    /* Obs: Comando "php artisan migrate" executa o método up() */
    /* Obs: Comando "php artisan migrate:rollback" executa o método down(),reverte as migrações. */

    /*  php artisan migrate
        Mais antiga para a amais atual */

    /*  php artisan migrate:rollback
        Da mais atual para a mais antiga */
}
