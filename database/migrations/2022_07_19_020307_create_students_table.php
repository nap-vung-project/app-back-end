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
        Schema::create('students', function (Blueprint $table) {
            $table->increments("id");
            $table->string("studentName", 100);
            $table->string("studentPhone", 100);
            $table->string("studentEmail", 50);
            $table->unsignedInteger("addressId");
            $table->unsignedInteger("accountId");
            $table->timestamps();
            $table->foreign('addressId')->references('id')->on('address_info')
                                    ->onUpdate('cascade')
                                    ->onDelete('cascade');
            $table->foreign('accountId')->references('id')->on('accounts')
                                    ->onUpdate('cascade')
                                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
