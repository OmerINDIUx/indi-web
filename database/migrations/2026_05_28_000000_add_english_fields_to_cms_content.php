<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->string('slug_en')->nullable()->unique()->after('slug');
            $table->text('content_en')->nullable()->after('content');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->string('address_en')->nullable()->after('address');
            $table->text('description_en')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropUnique(['slug_en']);
            $table->dropColumn(['title_en', 'slug_en', 'content_en']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'address_en', 'description_en']);
        });
    }
};
