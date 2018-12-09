<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            //user
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            //contact
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('users');
            // last_message: content, dateTime
            $table->text('last_message')->nullable();
            $table->dateTime('last_time')->nullable();

            $table->boolean('listen_notifications')->default(true);
            $table->boolean('has_blocked')->default(false);
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
        Schema::dropIfExists('conversations');
    }
}
