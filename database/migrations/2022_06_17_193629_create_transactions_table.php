<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('destination_id')->constrained();
            $table->unsignedBigInteger('status_id');
            $table->date('departure_date');
            $table->date('return_date');
            $table->bigInteger('quantity');
            $table->bigInteger('total');
            $table->string('img_transaction_original');
            $table->string('img_transaction_encrypted');

            $table->foreign('status_id')->references('id')->on('status_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
