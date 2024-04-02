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
        Schema::create('educations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('userprofile_id')->constrained('userprofiles')->onDelete('cascade');
        $table->string('institution');
        $table->string('degree');
        $table->string('field_of_study');
        $table->date('start_date');
        $table->date('end_date')->nullable();
        $table->text('description')->nullable();
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
        Schema::dropIfExists('educations');
    }
};
