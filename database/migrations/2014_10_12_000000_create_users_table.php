<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
            $table->string('display_name');
            $table->string('username')->unique();
            $table->text('biography')->nullable();
            $table->string('job')->nullable();
            $table->string('social')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('admin')->default(0);
            $table->boolean('writer')->default(0);
            $table->string('team')->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
