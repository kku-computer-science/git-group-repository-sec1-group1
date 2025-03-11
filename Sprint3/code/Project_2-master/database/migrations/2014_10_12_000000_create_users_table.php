<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('fname_en');
            $table->string('lname_en');
            $table->string('fname_th');
            $table->string('lname_th');
            $table->string('doctoral_degree')->nullable();
            $table->string('academic_ranks_en')->nullable();
            $table->string('academic_ranks_th')->nullable();
            $table->string('position_en')->nullable();
            $table->string('position_th')->nullable();
            $table->string('title_name_th')->nullable();
            $table->string('title_name_en')->nullable();
            $table->string('picture')->nullable();
            $table->integer('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // $table->unsignedBigInteger('program_id')->nullable();
            // $table->unsignedBigInteger('department_id')->nullable();
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
