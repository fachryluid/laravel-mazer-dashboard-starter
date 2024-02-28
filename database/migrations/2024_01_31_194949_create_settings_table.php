<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_desc');
            $table->string('auth_bg')->nullable();
            $table->string('report_logo')->nullable();
            $table->string('app_logo')->nullable();
            $table->text('report_header');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
