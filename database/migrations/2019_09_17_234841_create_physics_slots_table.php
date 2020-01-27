<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicsSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physics_slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('booked');
            $table->string('mobile_number', 20)->nullable();
            $table->string('place')->nullable();
            $table->string('address')->nullable();
            $table->smallInteger('students')->nullable();
            $table->smallInteger('fees')->nullable();
            $table->json('chapters')->nullable();
            $table->json('type')->nullable();

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
        Schema::dropIfExists('physics_slots');
    }
}
