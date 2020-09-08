<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_code',30)->nullable();
            $table->string('slug',75)->nullable();
            $table->string('image')->nullable()->default(null);
            $table->date('date_of_birth')->nullable();
            $table->string('gender',10)->nullable();
            $table->string('address',150)->nullable();
            $table->string('phone_number',50)->nullable();
            $table->unsignedBigInteger('cst_id')->nullable();
            $table->string('no_cst')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('is_verified',2);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cst_id')->references('id')->on('categories_states')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
