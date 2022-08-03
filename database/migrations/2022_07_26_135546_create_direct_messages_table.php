<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_messages', function (Blueprint $table) {
            $table->id();
            $table->string('senderId');
            $table->string('senderName');
            $table->string('senderImage')->default('https://kilimofy.s3.amazonaws.com/Uploads/avatars/default.png');
            $table->string('receiver_id');
            $table->string('receiverName');
            $table->string('receiverImage')->default('https://kilimofy.s3.amazonaws.com/Uploads/avatars/default.png');
            $table->longText('text');
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
        Schema::dropIfExists('direct_messages');
    }
}
