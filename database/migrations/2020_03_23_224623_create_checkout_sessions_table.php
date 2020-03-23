<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id')->unique()->nullable();
            $table->string('session_id')->unique();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('voucher_id')->index();
            $table->string('status')->default('new');
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
        Schema::dropIfExists('checkout_sessions');
    }
}
