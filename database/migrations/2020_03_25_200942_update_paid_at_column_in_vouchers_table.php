<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaidAtColumnInVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // workaround - varcher cannot be converted to timestamp

        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropColumn('paid_at');
        });

        Schema::table('vouchers', function (Blueprint $table) {
            $table->timestamp('paid_at')->nullable()->after('deleted_at');
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
        });

        Schema::table('vouchers', function (Blueprint $table) {
            $table->string('paid_at')->nullable()->after('deleted_at');
        });
    }
}
