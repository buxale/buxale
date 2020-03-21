<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');

            $table->string('code')->unique();
            $table->float('value', 8, 2);
            $table->json('meta')->nullable();

            $table->string('beneficiary_company');
            $table->string('beneficiary_name');
            $table->string('beneficiary_street');
            $table->string('beneficiary_street_no');
            $table->string('beneficiary_zip');
            $table->string('beneficiary_city');
            $table->string('beneficiary_country');
            $table->string('beneficiary_email');
            $table->string('beneficiary_phone')->nullable();

            $table->string('customer_name');
            $table->string('customer_street');
            $table->string('customer_street_no');
            $table->string('customer_zip');
            $table->string('customer_city');
            $table->string('customer_country');
            $table->string('customer_email');
            $table->string('customer_phone')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
