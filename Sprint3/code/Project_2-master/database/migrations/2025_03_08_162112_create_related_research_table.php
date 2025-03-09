<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatedResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_research', function (Blueprint $table) {
            $table->id();
            $table->string('re_title');
            $table->text('re_desc');
            $table->date('public_date');
            $table->string('source_url', 200)->nullable();
            $table->string('re_type', 100);
            $table->foreignId('re_group_id')->constrained('research_groups')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('and_author')->nullable();
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
        Schema::dropIfExists('related_research');
    }
}
