<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content')->comment('Nội dung comment');
            $table->unsignedBigInteger('reply_for')->nullable()->comment('Phản hồi comment');
            $table->unsignedBigInteger('product_id')->comment('ID sản phẩm');
            $table->unsignedBigInteger('user_id')->comment('ID người comment');
            $table->timestamp('created_at')->comment('Thời gian tạo comment');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
