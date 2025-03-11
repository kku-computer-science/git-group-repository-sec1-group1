<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationCustomFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_custom_field_values', function (Blueprint $table) {
            $table->id(); // สร้าง primary key (id)
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('custom_field_id');
            $table->text('field_value')->nullable(); 
            $table->timestamps(); 

            // สร้าง foreign key constraints
            $table->foreign('application_id')->references('id')->on('application_detail')->onDelete('cascade');
            $table->foreign('custom_field_id')->references('id')->on('application_custom_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_custom_field_values');
    }
}
