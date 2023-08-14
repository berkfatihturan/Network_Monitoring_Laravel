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
        Schema::create('device_mail_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devices_id')->nullable();
            $table->string('min_temp')->nullable();
            $table->string('max_temp')->nullable();
            $table->string('min_humidity')->nullable();
            $table->string('max_humidity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_mail_settings');
    }
};
