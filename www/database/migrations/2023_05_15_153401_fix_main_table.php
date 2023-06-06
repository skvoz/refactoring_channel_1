<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Main', function (Blueprint $table) {
            $table->string('field1')->nullable()->change();
            $table->string('field2')->nullable()->change();
            $table->string('field3')->nullable()->change();
            $table->string('field4')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Main', function (Blueprint $table) {
            $table->string('field1')->change();
            $table->string('field2')->change();
            $table->string('field3')->change();
            $table->string('field4')->change();
        });
    }
}
