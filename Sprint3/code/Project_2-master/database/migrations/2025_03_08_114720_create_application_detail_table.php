<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_detail', function (Blueprint $table) {
            $table->id(); // สร้าง primary key (id)
            $table->unsignedBigInteger('research_group_id'); 
            $table->dateTime('app_deadline'); 
            $table->string('role'); 
            $table->integer('amount'); 
            $table->text('app_detail'); 
            $table->timestamps();
            $table->text('qualifications'); 
            $table->text('preferred_qualifications')->nullable(); 
            $table->text('required_documents'); 
            $table->string('salary_range_old')->nullable(); 
            $table->string('salary_amount')->nullable(); 
            $table->string('salary_period')->default('per month'); 
            $table->string('work_location'); 
            $table->date('start_date'); 
            $table->date('end_date')->nullable(); 
            $table->text('application_process'); 
            $table->string('contact_name')->nullable(); 
            $table->string('contact_email')->nullable(); 
            $table->string('contact_phone')->nullable(); 

            // สร้าง foreign key constraints
            $table->foreign('research_group_id')->references('id')->on('research_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_detail');
    }
}
