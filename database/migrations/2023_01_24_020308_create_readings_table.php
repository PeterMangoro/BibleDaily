<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->foreignId('bible_session_id');
            $table->string('verse');
            $table->string('verse_normalized')->virtualAs("regexp_replace(verse,'[^A-Za-z0-9]','')")->index();
            $table->text('notes')->fulltext();
            $table->text('notes_normalized')->virtualAs("regexp_replace(notes,'[^A-Za-z0-9]','')")->index();
            $table->text('prayer_points')->nullable();
            $table->text('prayer')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('readings');
    }
};
