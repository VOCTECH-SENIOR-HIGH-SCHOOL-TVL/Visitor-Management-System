<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToVisitorsTable extends Migration
{
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->string('status')->default('Pending'); // Add status column
        });
    }

    public function down()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
