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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('vacant_id')->references('id')->on('vacant_details')->onDelete('cascade');
            $table->string('requesitor_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('faculty_id')->references('userInstitution_id')->on('users')->onDelete('cascade');
            $table->string('request_type');
            $table->string('attendee_type');
            $table->string('day');
            $table->string('time');
            $table->string('date');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('requests');
    }
};
