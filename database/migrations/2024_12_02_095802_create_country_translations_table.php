<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('country_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            $table->string('language');
            $table->string('name');
            $table->longText('flag_alt');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('country_translations');
    }
};
