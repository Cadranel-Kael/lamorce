<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mandate_contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mandate_id')->constrained('mandates')->onDelete('cascade');
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mandate_contact');
    }
};
