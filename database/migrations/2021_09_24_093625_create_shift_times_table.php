<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->date('shift_date')->nullable();
            $table->timestamp("shift_start")->nullable();
            $table->timestamp("shift_end")->nullable();
            $table->timestamp("Clock_in")->nullable();
            $table->timestamp("Clock_out")->nullable();
            $table->boolean('shift_complete')->default(0);
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
        Schema::dropIfExists('shift_times');
    }
}
