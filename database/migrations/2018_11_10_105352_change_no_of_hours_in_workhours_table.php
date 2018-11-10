<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNoOfHoursInWorkhoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workhours', function (Blueprint $table) {
            $table->float('no_of_hours', 8, 2)->change();
            $table->float('hourly_rate', 8, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workhours', function (Blueprint $table) {
            $table->integer('no_of_hours')->change();
            $table->integer('hourly_rate')->change();
        });
    }
}