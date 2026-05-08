<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DemoTestCategoryChange1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('demo_test_category', function (Blueprint $table) {

            $table->string('cover', 200)->nullable()->comment('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DO NOT PUT DANGEROUS DROP/DELETE OPERATION HERE
    }
}