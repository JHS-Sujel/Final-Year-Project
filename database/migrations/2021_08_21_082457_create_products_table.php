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
            $table->bigIncrements('id');
            $table->string('image')->default('default');
            $table->string('title')->unique();
            $table->string('sub_title')->nullable();
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2)->default(0);
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('brand_id');
            $table->text('details')->nullable();
            $table->boolean('status')->default(0);
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
