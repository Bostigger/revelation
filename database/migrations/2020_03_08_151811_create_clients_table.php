<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('clients');
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('membership_id')->unique();
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('dob')->nullable()->comment('Date of Birth');
            $table->string('occupation')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('alternate_phone_number')->nullable();
            $table->string('proof_of_account')->nullable();
            $table->string('password');
            $table->enum('marital_status', ['SINGLE','MARRIED','DIVORCED','WIDOWED'])->default('SINGLE');
            $table->enum('account_setup_complete',[1,0])->default(0);
            $table->dateTime('last_login_date')->useCurrent();
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
        Schema::dropIfExists('clients');
    }
}
