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
            $table->string('name');
            $table->string('slug')->unique();
            $table->float('origin_price', 12, 0);
            $table->float('price', 12, 0);
            $table->text('note')->nullable()->comment('Lưu ý: khuyến mãi ...');
            $table->string('image')->comment('Ảnh sản phẩm');
            $table->text('description')->comment('Mô tả');
            $table->text('parameter')->comment('Thông số kỹ thuật');
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories');
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
