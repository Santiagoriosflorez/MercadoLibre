<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trolleys', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('user_id')->unsigned()->unique();
            $table->timestamps();
            $table->softDeletes();


			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('trolleys');
    }
};
