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
        Schema::create('s_e_o_pages', function (Blueprint $table) {
            $table->id();
            $table->text('meta_title');
            $table->text('meta_description');
            $table->text('meta_key_words');
            $table->text('seoable_type');
            $table->text('seoable_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_s_e_o_pages');
    }
};
