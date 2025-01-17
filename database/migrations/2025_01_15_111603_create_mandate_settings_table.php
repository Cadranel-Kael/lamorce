<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mandate_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('meeting_type', ['weekday', 'date']);
            $table->enum('weekday', array_column(App\Enum\WeekDay::cases(), 'name'))->nullable();
            $table->tinyInteger('week_of_month')->nullable();
            $table->tinyInteger('specific_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mandate_settings');
    }
};
