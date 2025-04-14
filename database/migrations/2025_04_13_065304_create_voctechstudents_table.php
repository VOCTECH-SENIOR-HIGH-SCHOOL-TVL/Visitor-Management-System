<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoctechstudentsTable extends Migration
{
    public function up()
    {
        Schema::create('voctechstudents', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('contact_number');
            $table->string('address');
            $table->integer('visits_count')->default(0);
            $table->string('last_visitor')->nullable(); // To store the name of the last visitor
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voctechstudents');
    }
}