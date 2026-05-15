<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->unique()->nullable()->after('email');
            $table->string('google_id')->nullable()->after('phone_number');
            $table->string('avatar')->nullable()->after('google_id');
            $table->timestamp('phone_verified_at')->nullable()->after('avatar');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'google_id', 'avatar', 'phone_verified_at']);
        });
    }
};

// composer require laravel/socialite
