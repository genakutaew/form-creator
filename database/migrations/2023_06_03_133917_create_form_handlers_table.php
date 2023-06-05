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
        Schema::create('form_handlers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->string('type')->nullable(false);
            $table->string('payload')->nullable(false);
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
        Schema::dropIfExists('form_handlers');
    }
};
