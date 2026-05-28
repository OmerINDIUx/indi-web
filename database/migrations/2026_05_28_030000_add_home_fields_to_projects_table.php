<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedTinyInteger('home_order')->nullable()->after('status');
            $table->string('home_year', 20)->nullable()->after('home_order');
            $table->string('home_time', 60)->nullable()->after('home_year');
            $table->string('home_time_en', 60)->nullable()->after('home_time');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['home_order', 'home_year', 'home_time', 'home_time_en']);
        });
    }
};
