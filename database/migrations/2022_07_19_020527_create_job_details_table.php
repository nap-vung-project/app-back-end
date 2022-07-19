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
        Schema::create('job_details', function (Blueprint $table) {
            $table->increments("id");
            $table->string("companyName", 100);
            $table->enum("status", ['active', 'inActive']);
            $table->unsignedInteger("titleWorkId");
            $table->unsignedInteger("rankId");
            $table->unsignedInteger("jobDescription");
            $table->timestamps();
            $table->foreign('titleWorkId')->references('id')->on('job_title')
                                    ->onUpdate('cascade')
                                    ->onDelete('cascade');
            $table->foreign('rankId')->references('id')->on('ranks')
                                    ->onUpdate('cascade')
                                    ->onDelete('cascade');
            $table->foreign('jobDescription')->references('id')->on('job_descriptions')
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
        Schema::dropIfExists('job_details');
    }
};
