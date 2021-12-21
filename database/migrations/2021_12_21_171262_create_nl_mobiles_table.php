<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNlMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nl_mobiles', function (Blueprint $table) {
            $table->id();
            $table->string('mobile');
            $table->integer('vote_positive')->default(0);
            $table->integer('vote_negative')->default(0);
            $table->integer('vote_other')->default(0);
            $table->integer('count_comment')->default(0);
            $table->integer('count_views')->default(0);
            $table->integer('count_search')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nl_mobiles');
    }
}
