<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressDetailsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('company')->nullable()->after('email');
            $table->string('street')->nullable()->after('company');
            $table->string('street_no')->nullable()->after('street');
            $table->string('zip')->nullable()->after('street_no');
            $table->string('city')->nullable()->after('zip');
            $table->string('country')->nullable()->after('city');
            $table->string('phone')->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['company', 'street', 'street_no', 'zip', 'city', 'country', 'phone']);
        });
    }
}
