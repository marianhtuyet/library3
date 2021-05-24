<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReaderBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reader_books', function (Blueprint $table) {
            $table->id();
            $table->integer('reader_id');
            $table->integer('book_id');
            $table->date('date_borrow');
            $table->date('date_due');
            $table->integer('limit_date');
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
        Schema::dropIfExists('reader_books');
    }
}
