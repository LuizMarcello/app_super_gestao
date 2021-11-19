<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            /* É fundamental que a coluna da tabela que vai receber a chave estrangeira
               tenha o mesmo tipo da chave primária, no caso, "bigint unsigned".
               (unsigned: não aceita valores negativos). */
            //Colunas:
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);

            $table->timestamps();

            //Constraints
            $table->foreign('produto_id')->references('id')->on('produtos');
            //Garante que um único produto tenha apenas um produto_detalhes.
            //Que seja somente um-para-um
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
