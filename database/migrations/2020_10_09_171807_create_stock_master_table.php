<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('book_id');
            $table->integer('beginning')->nullable()->default(0);
            $table->integer('trf_in')->nullable()->default(0);
            $table->integer('trf_out')->nullable()->default(0);
            $table->integer('trx_borrow')->nullable()->default(0);
            $table->integer('trx_return')->nullable()->default(0);
            $table->integer('ending')->nullable()->default(0);
            $table->unsignedBigInteger('admin_id');
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
        Schema::dropIfExists('stock_master');
    }
}
