<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacant_details', function (Blueprint $table) {
            $table->id();
            $table->string('userInstitutional_id')->references('userInstitution_id')->on('users')->onDelete('cascade');
            $table->string('day');
            $table->string('vacant_time');
            $table->string('designated_office');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacant_details');
    }
};
