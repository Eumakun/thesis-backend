<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('age');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('industry_id');
            $table->string('job_description', 255);
            $table->date('date_graduated');
            $table->date('date_employed');
            $table->timestamps();

            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade');

            $table->foreign('school_id')
            ->references('id')
            ->on('schools')
            ->onDelete('cascade');

            $table->foreign('job_id')
            ->references('id')
            ->on('job_types')
            ->onDelete('cascade');

            $table->foreign('industry_id')
            ->references('id')
            ->on('industries')
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
        Schema::dropIfExists('survey_answers');
    }
}
