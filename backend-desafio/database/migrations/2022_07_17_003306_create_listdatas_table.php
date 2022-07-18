<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listdatas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->text('descricao');
            $table->string('modal', 50);
            $table->integer('valor');
            $table->time();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listdatas');
    }
}
