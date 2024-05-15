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
        Schema::create('live_addresses_imported', function (Blueprint $table) {
            $table->id();
            $table->string('outcode')->nullable();
            $table->string('postcode');
            $table->text('fulladdress');
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('category')->nullable();
            $table->string('iconpath')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('code')->nullable();
            $table->string('iata')->nullable();
            $table->string('icao')->nullable();
            $table->timestamp('created')->nullable();
            $table->unsignedBigInteger('post_code_id')->nullable();
            $table->foreign('post_code_id')->references('id')->on('post_codes')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_addresses_imported');
    }
};



// CREATE INDEX idx_postcode ON live_addresses_imported(postcode);
// CREATE INDEX idx_fulladdress ON live_addresses_imported(fulladdress);