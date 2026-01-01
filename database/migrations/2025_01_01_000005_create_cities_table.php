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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
            $table->string('state_code', 10)->index()->nullable();
            $table->string('state_name')->nullable();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->string('country_code', 2)->index()->nullable();
            $table->string('country_name')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('native')->nullable();
            $table->string('type')->nullable();
            $table->string('level')->nullable();
            $table->unsignedBigInteger('parent_id')->index()->nullable();
            $table->bigInteger('population')->nullable();
            $table->string('timezone')->nullable();
            $table->json('translations')->nullable();
            $table->string('wikiDataId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
