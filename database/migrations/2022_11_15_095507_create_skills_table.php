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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Person::class);
            $table->integer('faceOffs');
            $table->integer('aggressiveness');
            $table->integer('strength');
            $table->integer('balance');
            $table->integer('agility');

            $table->integer('defenseAwareness');
            $table->integer('dicipline');
            $table->integer('endurance');
            $table->integer('durability');
            $table->integer('bodyChecking');

            $table->integer('offensiveAwareness');
            $table->integer('passing');
            $table->integer('puckControl');
            $table->integer('speed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
};
