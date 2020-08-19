<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendsTable extends Migration
{
    public function up()
    {
        Schema::create('attends', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('week_number');
            $table->integer('month');
            $table->integer('year');
            $table->integer('saturday');
            $table->integer('sunday');
            $table->integer('monday');
            $table->integer('tuesday');
            $table->integer('wednesday');
            $table->integer('thursday');
            $table->integer('work_days');
            $table->integer('off_hours');
            $table->string('loans');
            $table->string('cutoff');
            $table->string('additions');
            $table->integer('company_id');
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
        Schema::dropIfExists('attends');
    }
}
