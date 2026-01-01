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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('iso3', 3)->unique();
            $table->string('iso2', 2)->unique();
            $table->string('numeric_code', 3)->nullable();
            $table->string('phonecode', 20)->nullable();
            $table->string('capital')->nullable();
            $table->string('currency', 3)->nullable();
            $table->string('currency_name')->nullable();
            $table->string('currency_symbol', 10)->nullable();
            $table->string('tld', 10)->nullable();
            $table->string('native')->nullable();
            $table->string('emoji', 10)->nullable();
            $table->string('emojiU', 20)->nullable();
            $table->bigInteger('population')->nullable();
            $table->decimal('gdp', 20, 2)->nullable();
            $table->string('region')->nullable();
            $table->foreignId('region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->string('subregion')->nullable();
            $table->foreignId('subregion_id')->nullable()->constrained('subregions')->onDelete('set null');
            $table->string('nationality')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('area_sq_km', 15, 2)->nullable();
            $table->string('postal_code_format')->nullable();
            $table->string('postal_code_regex')->nullable();
            $table->json('timezones')->nullable();
            $table->json('translations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
