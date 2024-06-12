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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trolley_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('stock')->unsigned();
            $table->timestamps();
			$table->softDeletes();

			$table->foreign('trolley_id')->references('id')->on('trolleys')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopping_carts');
    }
};
