<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextOfKinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_of_kins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('membership_id');
            $table->foreign('membership_id')->references('membership_id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('alternate_phone_number')->nullable();
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
        Schema::dropIfExists('next_of_kins');
    }
}
