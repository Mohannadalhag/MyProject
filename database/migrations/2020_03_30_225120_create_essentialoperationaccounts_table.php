<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEssentialoperationaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('essentialoperationaccounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('essentialoperation_id');
            $table->foreign('Account_id')->references('id')->on('accounts');
            $table->foreign('essentialoperation_id')->references('id')->on('essentialoperations');
            $table->unsignedInteger('user_id');
            $table->Integer('amount');
            $table->String('type');
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
        Schema::dropIfExists('essentialoperationaccounts');
    }
}
