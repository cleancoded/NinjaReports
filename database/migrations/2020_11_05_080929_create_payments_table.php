<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('no_allowed_analysis')->nullable();
            $table->string('no_allowed_audits')->nullable();
            $table->string('subscription_id')->nullable();
            $table->string('currency')->nullable();
            $table->double('amount')->nullable();
            $table->string('interval')->nullable();
            $table->string('product_id')->nullable();
            $table->string('trial_start')->nullable();
            $table->string('trial_end')->nullable();
            $table->string('current_period_start')->nullable();
            $table->string('current_period_end')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
