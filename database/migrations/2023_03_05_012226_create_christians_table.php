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
        Schema::create('christians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_normalized')->virtualAs("regexp_replace(name,'[^A-Za-z0-9]','')")->index();
            $table->string('username')->unique()->nullable();
            $table->string('contact');
            $table->string('gender');
            $table->string('dob');
            $table->string('province');
            $table->string('status')->nullable();
            $table->string('assembly')->nullable();
            $table->string('pastor')->nullable();
            $table->string('invite')->nullable();
            $table->string('need_accommodation');            
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
        Schema::dropIfExists('christians');
    }
};
