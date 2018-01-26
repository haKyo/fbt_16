<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable();
            $table->boolean('male')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('id_number')->nullable();
            $table->boolean('role')->nullable();
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
