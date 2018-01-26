<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColDropToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable()->after('remember_token');
            $table->boolean('male')->nullable()->after('remember_token');
            $table->string('address')->nullable()->after('remember_token');
            $table->string('phone')->nullable()->after('remember_token');
            $table->string('id_number')->nullable()->after('remember_token');
            $table->boolean('role')->nullable()->after('remember_token');
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
            $table->dropColumn('date_of_birth');
            $table->dropColumn('male');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('id_number');
            $table->dropColumn('role');
        });
    }
}
