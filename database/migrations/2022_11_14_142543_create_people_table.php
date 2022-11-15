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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('city');
            $table->string('country');
            $table->timestamps();
        });

        Schema::create('person_team', function(Blueprint $table) {
            $table->foreignId('person_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->dateTime('signed_at')->default(now());
            $table->dateTime('resigned_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_team');
        Schema::dropIfExists('people');
    }
};
