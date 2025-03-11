<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationCustomFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id'); // FK
            $table->string('field_label');
            $table->string('field_type', 50);
            $table->boolean('field_required')->default(false);
            $table->string('field_placeholder')->nullable();
            $table->timestamps(); // created_at & updated_at

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_custom_fields');
    }
}
