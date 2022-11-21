<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWalletToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('wallet', 8, 2)->default(0.00);
            $table->integer('cookie')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'wallet')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('wallet');
            });
        }
        if (Schema::hasColumn('users', 'cookie')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('cookie');
            });
        }
    }
}
