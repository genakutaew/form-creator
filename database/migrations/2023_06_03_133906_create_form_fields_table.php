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
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id')->nullable(false);
            $table->string('label')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('selector')->nullable(false);
            $table->string('selector_type')->nullable();
            $table->string('default_value')->nullable();
            $table->json('params')->nullable();
            $table->boolean('required')->nullable(false);
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
        Schema::dropIfExists('form_fields');
    }
};
