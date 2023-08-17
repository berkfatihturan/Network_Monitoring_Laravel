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
            $table->string('temp')->nullable();
            $table->string('temp_max')->nullable();
            $table->string('humidity')->nullable();
            $table->string('humidity_max')->nullable();
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
