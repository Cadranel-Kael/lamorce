<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time');
            $table->integer('amount');
            $table->foreignId('incoming_collection_id')->nullable()->constrained('collections');
            $table->foreignId('outgoing_collection_id')->nullable()->constrained('collections');
            $table->string('identifier')->nullable();
            $table->string('message')->nullable();
            $table->string('is_imported')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
