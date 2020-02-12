<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('nominee_id');
            $table->foreign('nominee_id')->references('id')->on('kt_residents')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('nominee2_id')->nullable();
            $table->foreign('nominee2_id')->references('id')->on('kt_residents')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code',6);
            $table->foreign('code')->references('code')->on('kt_residents')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['category_id','code']);
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
        Schema::dropIfExists('nominations');
    }
}
