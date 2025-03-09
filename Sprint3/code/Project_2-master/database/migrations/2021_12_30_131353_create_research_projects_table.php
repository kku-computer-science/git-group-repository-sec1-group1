<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_projects', function (Blueprint $table) {
            $table->id();
            $table->string('Project_name');
            // $table->string('Project_name_EN');
            $table->date('Project_start')->nullable();
            $table->date('Project_end')->nullable();
            $table->date('Project_year')->nullable();
            $table->string('funder')->nullable();
            $table->integer('budget')->nullable();
            $table->string('responsible_department')->nullable();
            $table->longText('note')->nullable();
            $table->unsignedBigInteger('fund_id')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->index('fund_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_prejects');
    }
}
