<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRecommendsReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__recommends__reviews', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('userrecommends_id')->unsigned();
            $table->integer('user_id')->unsigned();
			$table->integer('reviewrecommended');
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
        Schema::dropIfExists('user__recommends__reviews');
    }
}
