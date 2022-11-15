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
        Schema::create('tactics', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Team::class);
            $table->foreignIdFor(\App\Models\Person::class, 'goalkeeper_id');
            $table->foreignIdFor(\App\Models\Person::class, 'goalkeeper_backup_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_1_left_forward_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_1_center_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_1_right_forward_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_1_left_defender_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_1_right_defender_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_2_left_forward_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_2_center_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_2_right_forward_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_2_left_defender_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_2_right_defender_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_3_left_forward_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_3_center_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_3_right_forward_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_3_left_defender_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_3_right_defender_id');
            $table->foreignIdFor(\App\Models\Person::class, 'line_4_left_forward_id')->nullable();
            $table->foreignIdFor(\App\Models\Person::class, 'line_4_center_id')->nullable();
            $table->foreignIdFor(\App\Models\Person::class, 'line_4_right_forward_id')->nullable();
            $table->foreignIdFor(\App\Models\Person::class, 'line_4_left_defender_id')->nullable();
            $table->foreignIdFor(\App\Models\Person::class, 'line_4_right_defender_id')->nullable();
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
        Schema::dropIfExists('tactics');
    }
};
