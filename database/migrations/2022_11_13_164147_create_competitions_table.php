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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->tinyInteger('type')->default(0);
            $table->integer('max_teams')->default(0);
            $table->integer('meetings')->default(2);
            $table->integer('tier')->default(0);
            $table->integer('relegation')->default(0);
            $table->integer('promotion')->default(0);
            $table->integer('relegation_qualification')->default(0);
            $table->integer('promotion_qualification')->default(0);
            $table->boolean('recurring')->default(false);
            $table->integer('edition')->default(1);
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
        Schema::dropIfExists('competitions');
    }
};
