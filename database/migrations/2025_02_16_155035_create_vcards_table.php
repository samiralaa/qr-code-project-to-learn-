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
        Schema::create('vcards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->json('social_links')->nullable();
            $table->foreignId('qrcode_id')->unique()->constrained()->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vcards');
    }
};
