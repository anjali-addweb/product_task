<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('p_name');
            $table->unsignedBigInteger('cat_id')->nullable;
            $table->foreign('cat_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
            $table->text('price');
            $table->mediumText('image')->nullable;
            $table->text('status');
            $table->string('desc')->nullable;
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
        Schema::dropIfExists('products');
    }
}
