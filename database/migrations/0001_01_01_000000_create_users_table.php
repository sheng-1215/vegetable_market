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
        // Creating the users table with necessary columns
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->comment('User email address');
            $table->timestamp('email_verified_at')->nullable()->comment('Timestamp of email verification');
            $table->string('password')->comment('Hashed password for user authentication');
            $table->integer('OTP')->nullable()->default(123456)->comment('One-time password for verification');
            $table->string('status')->nullable()->comment('User status, e.g., Pending, Active');
            $table->rememberToken()->comment('Token for "remember me" functionality');
            $table->timestamps(); // created_at and updated_at columns
        });

        // Creating the password_reset_tokens table for password recovery
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary()->comment('Email address for password reset');
            $table->string('token')->comment('Reset token');
            $table->timestamp('created_at')->nullable()->comment('Timestamp when token was created');
        });

        // Creating the sessions table for user session management
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary()->comment('Session ID');
            $table->foreignId('user_id')->nullable()->index()->comment('Foreign key to users table');
            $table->string('ip_address', 45)->nullable()->comment('IP address of the user');
            $table->text('user_agent')->nullable()->comment('User agent string');
            $table->longText('payload')->comment('Serialized session data');
            $table->integer('last_activity')->index()->comment('Timestamp of last activity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping tables in reverse order to avoid foreign key constraints
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};