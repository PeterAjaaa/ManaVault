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
        Schema::table('deck_cards', function (Blueprint $table) {
            $table->foreignId('deck_id')->references('id')->on('decks')->onDelete('cascade');
            $table->foreignId('card_id')->references('id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deck_cards', function (Blueprint $table) {
            $table->dropForeign(['deck_id']);
            $table->dropForeign(['card_id']);
        });
    }
};
