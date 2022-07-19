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
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("jobId");
            $table->unsignedInteger("studentId");
            $table->string("CV", 1000);
            $table->timestamps();
            $table->foreign('jobId')->references('id')->on('jobs')
                                    ->onUpdate('cascade')
                                    ->onDelete('cascade');
            $table->foreign('studentId')->references('id')->on('students')
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
        Schema::dropIfExists('applicants');
    }
};
