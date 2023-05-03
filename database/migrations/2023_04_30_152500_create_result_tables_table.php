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
        Schema::create('result_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routine_semester_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subject_result_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('year_result_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->longText('result_details');
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
        Schema::dropIfExists('result_tables');
    }
};