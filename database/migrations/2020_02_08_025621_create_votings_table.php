<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('nominee_id');
            $table->foreign('nominee_id')->references('id')->on('kt_residents')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('kt_resident_id');
            $table->foreign('kt_resident_id')->references('id')->on('kt_residents')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['category_id','kt_resident_id']);
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
        Schema::dropIfExists('votings');
    }
}
