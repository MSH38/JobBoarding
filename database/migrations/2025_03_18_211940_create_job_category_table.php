<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('job_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('working_job_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            // $table->primary(['working_job_id', 'category_id']);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('job_category');
    }
};
