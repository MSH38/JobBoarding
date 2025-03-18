<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // /**
    //  * Run the migrations.
    //  */
    // public function up(): void
    // {
    //     Schema::table('job_location', function (Blueprint $table) {
    //         $table->foreignId('working_job_id')->constrained()->onDelete('cascade');
    //         $table->foreignId('location_id')->constrained()->onDelete('cascade');
    //         $table->primary(['working_job_id', 'location_id']);
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('job_location');
    // }

    public function up()
    {
        Schema::create('job_location', function (Blueprint $table) {
            $table->id();
            $table->foreignId('working_job_id')->constrained('working_jobs')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->timestamps();
        });
    }


};
