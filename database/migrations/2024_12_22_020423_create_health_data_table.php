<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('health_data', function (Blueprint $table) {
            $table->id();
            $table->string('pcon_code'); // Parliamentary constituency code
            $table->string('pcon_name'); // Parliamentary constituency name
            $table->string('group_code'); // Health condition group code
            $table->float('prevalence_percentage'); // Prevalence percentage of the condition
            $table->string('condition'); // Detailed condition name
            $table->text('description')->nullable(); // Description of the condition
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_data');
    }
};
