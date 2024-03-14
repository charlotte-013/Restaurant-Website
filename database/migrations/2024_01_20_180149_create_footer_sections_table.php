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
        Schema::create('footer_sections', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('instagram_url');
            $table->string('linkedin_url');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('opening_time1');
            $table->string('opening_time2');
            $table->string('closing_time1');
            $table->string('closing_time2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_sections');
    }
};
