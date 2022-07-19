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
        Schema::create('companies', function (Blueprint $table) {
            $table->increments("id");
            $table->string("companyName", 100);
            $table->string("companyPhone", 100);
            $table->string("companyEmail", 50);
            $table->string("iamge", 1000);
            $table->string("description", 1000);
            $table->enum("status", ['active', 'inActive']);
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
        Schema::dropIfExists('companies');
    }
};
