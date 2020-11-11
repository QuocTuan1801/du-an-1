<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên hóa đơn');
            $table->string('code')->comment('Mã hóa đơn');
            $table->string('full_name')->comment('Tên người dùng đặt');
            $table->string('phone')->comment('Số điện thoại');
            $table->string('email')->comment('Email');
            $table->string('message')->nullable()->comment('Lời nhắn');
            $table->unsignedBigInteger('user_id')->nullable()->comment('ID người dùng');
            $table->float('cost', 12, 0)->comment('Tổng số tiền');
            $table->string('voucher_id')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
