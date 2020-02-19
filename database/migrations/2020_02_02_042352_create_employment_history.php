<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('survey_id');
            $table->string('job_description', 255)->nullable();
            $table->date('date_employed')->nullable();
            $table->date('date_resigned')->nullable();
            $table->integer('job_id')->unsigned()->nullable();
            $table->integer('industry_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('survey_id')
                ->references('id')
                ->on('survey_answers')
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
        Schema::table('employment_history', function (Blueprint $table) {
            //
        });
    }
}
