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
        Schema::create('certifications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('userprofile_id')->constrained('userprofiles')->onDelete('cascade');
        $table->string('name');
        $table->string('issuing_organization');
        $table->date('issue_date');
        $table->date('expiration_date')->nullable();
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
        Schema::dropIfExists('certifications');
    }
};
