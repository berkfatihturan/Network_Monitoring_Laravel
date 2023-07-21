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
        Schema::create('settings', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->string('company_name')->default("NONE");
            $table->string('logo',100)->default("NONE")->nullable();
            $table->string('from_email_address')->default("NONE")->nullable();
            $table->string('mail_app_password')->default("NONE")->nullable();
            $table->string('primary_color',7)->default("#64CCC5")->nullable();
            $table->string('secondary_color',7)->default("#000000")->nullable();
            $table->string('status',5)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
