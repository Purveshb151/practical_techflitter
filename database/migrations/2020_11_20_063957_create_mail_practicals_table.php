<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailPracticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_practicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sender_id");
            $table->foreign('sender_id')->references('id')->on('users');
            $table->unsignedBigInteger("receiver_id");
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->string('subject')->nullable();
            $table->longtext('message')->nullable();
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
        Schema::dropIfExists('mail_practicals');
    }
}
