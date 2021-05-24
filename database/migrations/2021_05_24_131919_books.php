<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Books extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('original')->nullable();
            $table->string('temporary_content')->nullable();
            $table->integer('type_book_id');
            $table->integer('language_id');
            $table->integer('ddc_id');
            $table->integer('author_id');
            $table->string('chapter');
            $table->string('summary');
            $table->string('series');
            $table->integer('publishing_company_id');
            $table->integer('republishing');
            $table->year('year_publishing');
            $table->integer('page_number');
            $table->integer('site_id');
            $table->date('input_date');
            $table->float('cost');
            $table->integer('unit_id');
            $table->integer('status_id');
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
        Schema::dropIfExists('books');
    }
}
