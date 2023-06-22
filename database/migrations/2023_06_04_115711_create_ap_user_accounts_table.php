<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ap_user_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('ap_username');
            $table->string('ap_password');
            $table->string('ap_fullname');
            $table->string('ap_accountType');
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
        Schema::dropIfExists('ap_user_accounts');
    }
};