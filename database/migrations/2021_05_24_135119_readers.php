<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Readers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('full_name');
            $table->integer('gender');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email');
            $table->string('note')->nullable();
            $table->binary('image');
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
        Schema::dropIfExists('readers');
    }
}
