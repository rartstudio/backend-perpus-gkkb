<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pub_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('cbo_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('qty')->nullable();
            $table->string('cover')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('pub_id')->references('id')->on('publishers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('cbo_id')->references('id')->on('categories_books')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
