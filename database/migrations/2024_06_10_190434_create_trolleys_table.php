<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trolleys', function (Blueprint $table) {
            $table->id();
			$table->integer('id_trolley')->unsigned();
			$table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();


			$table->foreign('user_id')->references('id')->on('users');
        });
    }


    public function down()
    {
        Schema::dropIfExists('trolleys');
    }
};
