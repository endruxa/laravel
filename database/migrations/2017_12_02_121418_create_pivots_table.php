<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivots', function (Blueprint $table) {
            $table->string('articles_slug');
            $table->string('tags_slug');

            $table->foreign('articles_slug')->references('slug')->on('articles')->onDelete('cascade');
            $table->foreign('tags_slug')->references('slug')->on('tags')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pivots', function (Blueprint $table){
            $table->dropForeign('pivots_articles_slug_foreign');
            $table->dropForeign('pivots_tags_slug_foreign');

            /*$table->dropIndex('pivots_articles_slug_index');
            $table->dropIndex('pivots_tags_slug_index');*/
        });

        Schema::dropIfExists('pivots');
    }
}
