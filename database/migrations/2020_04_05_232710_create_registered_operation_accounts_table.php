<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisteredOperationAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_operation_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('registered_operation_id');
            $table->foreign('Account_id')->references('id')->on('accounts');
            $table->foreign('registered_operation_id')->references('id')->on('registered_operations');
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
        Schema::dropIfExists('registered_operation_accounts');
    }
}
