<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentStatusAtVouchers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->string('paid_at')->nullable();
            $table->string('customer_name')->nullable()->change();
            $table->string('customer_street')->nullable()->change();
            $table->string('customer_street_no')->nullable()->change();
            $table->string('customer_zip')->nullable()->change();
            $table->string('customer_city')->nullable()->change();
            $table->string('customer_country')->nullable()->change();
            $table->string('customer_email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropColumn('paid_at');
            $table->string('customer_name')->change();
            $table->string('customer_street')->change();
            $table->string('customer_street_no')->change();
            $table->string('customer_zip')->change();
            $table->string('customer_city')->change();
            $table->string('customer_country')->change();
            $table->string('customer_email')->change();
        });
    }
}
